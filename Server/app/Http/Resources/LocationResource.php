<?php

namespace App\Http\Resources;

use App\Models\Specie;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->whenLoaded('user')),
            'species' => SpecieResource::collection($this->whenLoaded('species')),
            'lat' => $this->lat,
            'lng' => $this->lng,
            'image_urls' => $this->imageUrls,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
