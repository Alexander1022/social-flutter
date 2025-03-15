<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpecieResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'species' => SpecieResource::collection($this->whenLoaded('species')),
            'animal_kingdom' => new AnimalKingdomResource($this->whenLoaded('animalKingdom')),
            'habitat' => new HabitatResource($this->whenLoaded('habitat')),
            'common_name' => $this->common_name,
            'scientific_name' => $this->scientific_name,
            'image' => new FileRecordResource($this->whenLoaded('image')),
            'user' => new UserResource($this->whenLoaded('user')),
            'specie_types' => SpecieTypeResource::collection($this->whenLoaded('specieTypes')),
        ];
    }
}
