<?php

namespace App\Services;

use App\Models\Location;
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
        $data['user_id'] = auth()->user()->id; 
        $location = Location::create($data);
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $fileType = FileType::where('name', 'image')->firstOrFail();
                $path = $image->store('locations', 'public');
                
                // Create the file record with the polymorphic relationship
                $fileRecord = new FileRecord([
                    'path' => 'storage/' . $path,
                    'original_name' => $image->getClientOriginalName(),
                    'file_type_id' => $fileType->id,
                    'fileable_type' => Location::class,
                    'fileable_id' => $location->id
                ]);
                
                $fileRecord->save();
            }
        }
        
        if ($request->has('specie_ids')) {
            $location->specie()->attach($request->specie_ids);
        }
        
        return new LocationResource($location);
    }

/*     public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'latitude' => 'sometimes|required|numeric',
            'longitude' => 'sometimes|required|numeric',
        ]);

        $location = Location::findOrFail($id);
        $location->update($validatedData);
        return new LocationResource($location);
    } */

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
