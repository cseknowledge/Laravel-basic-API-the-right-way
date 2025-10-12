<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public static $wrap = 'category';
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type'=> 'categories',
            'id'=> $this->uuid,
            'attributes'=> [
                'name'=> $this->name,
                'slug'=> $this->slug,
                'description'=> $this->description,
                'status'=> $this->is_active,
            ],
            'links'=> [
                'self'=> route('categories.show', $this->uuid),
                'related'=> route('categories.show', $this->slug),
                'update' => route('categories.update', parameters: ['category' => $this->uuid]),
                'delete' => route('categories.destroy', parameters: ['category' => $this->uuid]),
            ],
        ];
    }

    public function with(Request $request)
    {
        return [
            'status' => 'success',
            'message' => 'Category retrieved successfully',
        ];
    }

    public function withResponse($request, $response): void
    {
        $response->header('Accept', 'application/json');
        $response->header('Content-Type', 'application/json');
        $response->header('Version', '1.0.0');
        $response->setStatusCode(200);
    }
}
