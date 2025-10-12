<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type'=> 'users',
            'id'=> $this->uuid,
            'attributes'=> [
                'name'=> $this->name,
                'email'=> $this->email,
                'roel'=> $this->role,
            ],
            'links'=> [
                'self'=> route('users.show', $this->uuid),
                'update' => route('users.update', parameters: ['user' => $this->uuid]),
                'delete' => route('users.destroy', parameters: ['user' => $this->uuid]),
            ],
        ];
    }
}
