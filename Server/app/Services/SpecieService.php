<?php

namespace App\Services;

use App\Models\Specie;
use App\Models\FileType;
use App\Http\Resources\SpecieResource;
use Illuminate\Http\Request;
use App\Http\Requests\SpecieRequest;

class SpecieService
{
    public function index(Request $request)
    {
        $query = Specie::with('images', 'specieType', 'animalKingdom', 'habitat', 'user');

        $search = $request->query('search');
        $specieTypeIds = $request->query('specie_type_ids');
        $habitatId = $request->query('habitat_id');
        

        if ($search) {
            $query->where('common_name', 'like', '%' . $search . '%')
                ->orWhere('scientific_name', 'like', '%' . $search . '%');
        }

        if ($specieTypeIds) {
            $query->whereIn('specie_type_id', explode(',', $specieTypeIds));
        }

        if ($habitatId) {
            $query->where('habitat_id', $habitatId);
        }

        $species = $query->get();

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
        $data['user_id'] = auth()->user()->id;
        $specie = Specie::create($data);
        $image = $request->file('image');
        $fileType = FileType::where('name', 'image')->firstOrFail();
        $path = $image->store('locations', 'public');
        $specie->image()->create([
            'path' => 'storage/' . $path,
            'original_name' => $image->getClientOriginalName(),
            'file_type_id' => $fileType->id,
        ]);
        return new SpecieResource($specie);
    }

    public function destroy($id)
    {
        $specie = Specie::findOrFail($id);
        $specie->delete();
        return response()->json(['message' => 'Specie deleted successfully.'], 200);
    }
}
