<?php

namespace App\Services;

use App\Models\Specie;
use App\Models\FileType;
use App\Http\Resources\SpecieResource;
use Illuminate\Http\Request;
use App\Http\Requests\SpecieRequest;

class SpecieService
{
    public function index()
    {
        $species = Specie::with('images', 'user', 'locations')->get();
        return SpecieResource::collection($species);
    }

    public function show($id)
    {
        $specie = Specie::findOrFail($id);
        return new SpecieResource($specie);
    }

    public function store(SpecieRequest $request)
    {
        $specie = Specie::create($request->validated());
        $file = $request->file('image');
        $fileType = FileType::where('name', 'image')->first();
        $specie->images()->create([
            'fileable_id' => $specie->id,
            'fileable_type' => Specie::class,
            'path' => $file->store('species'),
            'type_id' => $fileType->id,
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
