<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AchievementResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'points_to_complete' => $this->points_to_complete,
            'users' => UserResource::collection($this->whenLoaded('users'))->map(function ($user) {
                return array_merge($user->toArray(), [
                    'pivot_points' => $user->pivot->points ?? null,
                ]);
            }),
        ];
    }
}
