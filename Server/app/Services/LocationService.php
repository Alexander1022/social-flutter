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
}
