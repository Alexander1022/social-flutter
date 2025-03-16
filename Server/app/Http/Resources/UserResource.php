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
            'achievements' => AchievementResource::collection($this->whenLoaded('achievements')),
            'roles' => $this->getRoleNames(),
        ];
    }
}
