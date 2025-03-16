<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use App\Http\Resources\SpecieTypeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AchievementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'points_to_complete' => $this->points_to_complete,
            'reward_xp' => $this->reward_xp,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'users' => $this->whenLoaded('users', function() {
                return $this->users->map(function($user) {
                    return [
                        'user' => new UserResource($user),
                        'points' => $user->pivot->points,
                        'created_at' => $user->pivot->created_at,
                        'updated_at' => $user->pivot->updated_at,
                    ];
                });
            }),
            'specie_types' => $this->whenLoaded('specieTypes', function() {
                return SpecieTypeResource::collection($this->specieTypes);
            }),
        ];
    }
}