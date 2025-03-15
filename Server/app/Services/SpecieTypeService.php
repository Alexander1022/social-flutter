<?php

namespace App\Services;

use App\Models\SpecieType;
use App\Http\Resources\SpecieTypeResource;
use Illuminate\Http\Request;
use App\Http\Requests\SpecieTypeRequest;

class SpecieTypeService
{
    public function index()
    {
        $specieTypes = SpecieType::with('species')->get();
        return SpecieTypeResource::collection($specieTypes);
    }

    public function show($id)
    {
        $specie = SpecieType::findOrFail($id)->load('species');
        return new SpecieTypeResource($specie);
    }

    public function store(SpecieTypeRequest $request)
    {
        $validatedData = $request->validated();
        $specie = SpecieType::create($validatedData);
        return new SpecieTypeResource($specie);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'scientific_name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|string',
        ]);

        $specie = SpecieType::findOrFail($id);
        $specie->update($validatedData);
        return new SpecieTypeResource($specie);
    }

    public function destroy($id)
    {
        $specie = SpecieType::findOrFail($id);
        $specie->delete();
        return response()->json(['message' => 'SpecieType deleted successfully.'], 200);
    }
}
