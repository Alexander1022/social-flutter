<?php

namespace App\Services;

use App\Models\Location;
use App\Models\FileType;
use App\Http\Resources\LocationResource;
use Illuminate\Http\Request;
use App\Http\Requests\LocationRequest;

class LocationService
{
    public function index()
    {
        $locations = Location::with('images', 'user', 'specie')->get();
        LocationResource::collection($locations);
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
                $path = $image->store('locations', 'public'); // Note the 'public' disk parameter
                $location->images()->create([
                    'path' => 'storage/' . $path,
                    'original_name' => $image->getClientOriginalName(),
                    'file_type_id' => $fileType->id,
                ]);
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
}
