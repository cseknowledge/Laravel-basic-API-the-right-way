<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PromotionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type'          => 'promotions',
            'id'            => $this->uuid,
            'attributes'    => [
                'title'          => $this->title,
                'slug'          => $this->slug,
                'description'   => $this->description,
                'price'         => $this->price,
                'owner_id'      => $this->owner_id,
                'status'        => $this->status,
                'is_approved'   => $this->is_approved,
                'owner'         => UserResource::make($this->whenLoaded('owner')),
                'categories'    => CategoryResource::collection($this->whenLoaded('categories')),
                'Locations'     => LocationResource::collection($this->whenLoaded('locations')),
            ],
            'links'         => [
                'self'      => route('promotions.show', $this->uuid),
                'related'   => route('promotions.show', $this->slug),
                'update'    => route('promotions.update', parameters: ['promotion' => $this->uuid]),
                'delete'    => route('promotions.destroy', parameters: ['promotion' => $this->uuid]),
            ],
        ];
    }
}
