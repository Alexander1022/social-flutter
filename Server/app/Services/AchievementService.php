<?php

namespace App\Services;

use App\Models\Achievement;
use App\Http\Resources\AchievementResource;
use App\Http\Requests\AchievementRequest;

class AchievementService
{
    public function index()
    {
        $achievements = Achievement::with('users')->get();
        return AchievementResource::collection($achievements);
    }

    public function show($id)
    {
        try {
            $achievement = Achievement::findOrFail($id);
            $achievement->load('users');
            return new AchievementResource($achievement);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'No such achievement found'], 404);
        }
    }

    public function store(AchievementRequest $request)
    {
        $achievement = Achievement::create($request->validated());
        $specieTypes = $request->input('specie_types', []);
        $achievement->specieTypes()->sync($specieTypes);
        
        $achievement->load('users', 'specieTypes');
        return new AchievementResource($achievement);
    }

    public function destroy($id)
    {
        $achievement = Achievement::findOrFail($id);
        $achievement->delete();
        return response()->json(['message' => 'Achievement deleted successfully.'], 200);
    }
}
