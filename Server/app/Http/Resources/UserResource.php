<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'xp' => $this->xp,
            'locations' => LocationResource::collection($this->whenLoaded('locations')),
            'achievements' => $this->whenLoaded('achievements', function() {
                return $this->achievements->map(function($achievement) {
                    return [
                        'achievement' => new AchievementResource($achievement),
                        'points' => $achievement->pivot->points,
                    ];
                });
            }),
            'roles' => $this->getRoleNames(),
        ];
    }
}