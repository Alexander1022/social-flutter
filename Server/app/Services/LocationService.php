<?php

namespace App\Services;

use App\Models\Location;
use App\Models\Specie;
use App\Models\FileType;
use App\Models\FileRecord;
use App\Http\Resources\LocationResource;
use App\Http\Requests\LocationRequest;

class LocationService
{
    public function index()
    {
        $locations = Location::with('images', 'user', 'specie')->get();
        return LocationResource::collection($locations);
    }

    public function show($id)
    {
        try {
            $location = Location::findOrFail($id)->load('images', 'user', 'specie');
            return new LocationResource($location);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'No such location found'], 404);
        }
    }

    public function store(LocationRequest $request)
    {
        $data = $request->validated();
        $images = $request->file('images');

        $speciesGroups = [];
        $client = new \GuzzleHttp\Client();

        foreach ($images as $image) {
            try {
                $response = $client->post('http://10.108.4.159:5000/predict', [
                    'multipart' => [
                        [
                            'name' => 'file',
                            'contents' => file_get_contents($image),
                            'filename' => basename($image)
                        ]
                    ]
                ]);

                $result = json_decode($response->getBody()->getContents(), true);
                $species = $result['species_name'];
                $confidence = $result['confidence'];

                if ($confidence < 0.4) {
                    continue;
                }

                if (!isset($speciesGroups[$species])) {
                    $speciesGroups[$species] = [
                        'images' => [],
                        'highest_confidence' => 0,
                        'best_image' => null
                    ];
                }

                $speciesGroups[$species]['images'][] = $image;

                if ($confidence > $speciesGroups[$species]['highest_confidence']) {
                    $speciesGroups[$species]['highest_confidence'] = $confidence;
                    $speciesGroups[$species]['best_image'] = $image;
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        if (empty($speciesGroups)) {
            return response()->json(['message' => 'No species with confidence above threshold'], 404);
        }

        $bestSpecies = '';
        $highestConfidence = 0;

        foreach ($speciesGroups as $species => $speciesData) {
            if ($speciesData['highest_confidence'] > $highestConfidence) {
                $highestConfidence = $speciesData['highest_confidence'];
                $bestSpecies = $species;
            }
        }
        $specie = Specie::where('scientific_name', $bestSpecies)->first();
        if (!$specie) {
            return response()->json(['message' => 'No species found in database'], 404);
        }

        // Add specie_id to the data array
        $data['user_id'] = auth()->user()->id;
        $data['specie_id'] = $specie->id;

        // Add additional fields to data
        $data['confidence'] = $highestConfidence;
        $data['species_name'] = $bestSpecies;

        $location = Location::create($data);

        // Store only the images for the best species
        foreach ($speciesGroups[$bestSpecies]['images'] as $image) {
            $fileType = FileType::where('name', 'image')->firstOrFail();
            $path = $image->store('locations', 'public');

            $fileRecord = new FileRecord([
                'path' => 'storage/' . $path,
                'original_name' => $image->getClientOriginalName(),
                'file_type_id' => $fileType->id,
                'fileable_type' => Location::class,
                'fileable_id' => $location->id
            ]);
            $fileRecord->save();
        }
        // Load relationships
        $location->load('images', 'user', 'specie');

        return response()->json(['message' => 'Location created successfully', 'fun_fact' => $this->mockFunFact($bestSpecies), 'location' => new LocationResource($location)]);
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return response()->json(['message' => 'Location deleted successfully.'], 200);
    }

    public function getUserLocations()
    {
        $user = auth()->user();
        $locations = $user->locations()->with('images', 'specie')->get();
        return LocationResource::collection($locations);
    }

    private function getFunFact($scientificName)
    {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->post(config('services.open_ai.url'), [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . config('services.open_ai.api_key')
                ],
                'json' => [
                    'model' => config('services.open_ai.model'),
                    'store' => true,
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => "Write a random fun fact about $scientificName"
                        ]
                    ]
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            if (isset($result['choices'][0]['message']['content'])) {
                return $result['choices'][0]['message']['content'];
            }

            return "No fun facts available for this specie.";
        } catch (\Exception $e) {
            \Log::error('Failed to get fun fact: ' . $e->getMessage());
            return "No fun facts available for this specie.";
        }
    }

    private function mockFunFact($scientificName)
    {
        return "Did you know that $scientificName can live up to 100 years?";
    }
}
