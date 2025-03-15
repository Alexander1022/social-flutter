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
        return LocationResource::collection(Location::all());
    }

    public function show($id)
    {
        $location = Location::findOrFail($id);
        return new LocationResource($location);
    }

    public function store(LocationRequest $request)
    {
        $location = Location::create($request->validated());
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $fileType = FileType::where('name', 'image')->firstOrFail();
                $path = $image->store('locations');
                $location->images()->create([
                    'path' => $path,
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

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'latitude' => 'sometimes|required|numeric',
            'longitude' => 'sometimes|required|numeric',
        ]);

        $location = Location::findOrFail($id);
        $location->update($validatedData);
        return new LocationResource($location);
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return response()->json(['message' => 'Location deleted successfully.'], 200);
    }
}
