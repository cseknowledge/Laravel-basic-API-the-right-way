<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type'=> 'locations',
            'id'=> $this->uuid,
            'attributes'=> [
                'name'=> $this->name,
                'slug'=> $this->slug,
                'description'=> $this->description,
                'status'=> $this->is_active,
            ],
            'links'=> [
                'self'=> route('locations.show', $this->uuid),
                'related'=> route('locations.show', $this->slug),
                'update' => route('locations.update', parameters: ['location' => $this->uuid]),
                'delete' => route('locations.destroy', parameters: ['location' => $this->uuid]),
            ],
        ];
    }
}
