<?php

namespace App\Services;

use App\Models\Habitat;
use App\Http\Resources\HabitatResource;
use Illuminate\Http\Request;
use App\Http\Requests\HabitatRequest;

class HabitatService
{
    public function index()
    {
        $specieTypes = Habitat::with('species')->get();
        return HabitatResource::collection($specieTypes);
    }

    public function show($id)
    {
        $specie = Habitat::findOrFail($id)->load('species');
        return new HabitatResource($specie);
    }

    public function store(HabitatRequest $request)
    {
        $validatedData = $request->validated();
        $specie = Habitat::create($validatedData);
        return new HabitatResource($specie);
    }

    public function destroy($id)
    {
        $specie = Habitat::findOrFail($id);
        $specie->delete();
        return response()->json(['message' => 'Habitat deleted successfully.'], 200);
    }
}
