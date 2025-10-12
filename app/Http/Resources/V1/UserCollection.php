<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }

    public function with(Request $request): array
    {
        return [
            'status' => 'success',
            'message' => 'Users retrieved successfully',
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
