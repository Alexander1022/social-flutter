<?php

namespace App\Services;

use App\Models\Specie;
use App\Models\FileType;
use App\Http\Resources\SpecieResource;
use Illuminate\Http\Request;
use App\Http\Requests\SpecieRequest;

class SpecieService
{
    /* public function index(Request $request)
    {
        $query = Location::with('images', 'user', 'specie');

        $lat = $request->query('lat');
        $lng = $request->query('lng');
        $search = $request->query('search');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');
        $kilometers = $request->query('kilometers');

        if ($lat && $lng && $kilometers) {
            $query->whereRaw("ST_Distance_Sphere(point(lng, lat), point(?, ?)) <= ?", [$lng, $lat, $kilometers * 1000]);
        }

        if ($search) {
            $query->whereHas('specie', function ($q) use ($search) {
                $q->where('common_name', 'like', '%' . $search . '%')
                    ->orWhere('scientific_name', 'like', '%' . $search . '%');
            });
        }

        if ($startDate) {
            $query->whereDate('created_at', '>=', $startDate);
        }

        if ($endDate) {
            $query->whereDate('created_at', '<=', $endDate);
        }

        $locations = $query->get();
        return LocationResource::collection($locations);
    } */
    public function index(Request $request)
    {
        $query = Specie::with('images', 'specieType', 'animalKingdom', 'habitat', 'user');

        $search = $request->query('search');
        

        if ($search) {
            $query->where('common_name', 'like', '%' . $search . '%')
                ->orWhere('scientific_name', 'like', '%' . $search . '%');
        }


        $species = $query->get();
        // $species = Specie::with('image', 'specieType', 'animalKingdom', 'habitat', 'user')->get();
        return SpecieResource::collection($species);
    }

    public function show($id)
    {
        try {
            $specie = Specie::findOrFail($id);
            $specie->load('image', 'specieType', 'animalKingdom', 'habitat', 'user');
            return new SpecieResource($specie);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'No such species found'], 404);
        }
    }

    public function store(SpecieRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id; // Assuming you want to set the user_id to the authenticated user
        $specie = Specie::create($data);
        $image = $request->file('image');
        $fileType = FileType::where('name', 'image')->firstOrFail();
        $path = $image->store('locations', 'public'); // Note the 'public' disk parameter
        $specie->image()->create([
            'path' => 'storage/' . $path,
            'original_name' => $image->getClientOriginalName(),
            'file_type_id' => $fileType->id,
        ]);
        return new SpecieResource($specie);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'scientific_name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|string',
            // Add other specie-specific fields here
        ]);

        $specie = Specie::findOrFail($id);
        $specie->update($validatedData);
        return new SpecieResource($specie);
    }

    public function destroy($id)
    {
        $specie = Specie::findOrFail($id);
        $specie->delete();
        return response()->json(['message' => 'Specie deleted successfully.'], 200);
    }
}
