<?php

namespace App\DataTransferObjects\V1;

use Illuminate\Support\Str;

class CategoryDTO
{
    public function __construct(
        public string $name,
        public string $slug,
        public ?string $description,
        public bool $is_active
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            $data['name'],
            Str::slug(title: $data['name']),
            $data['description'] ?? null,
            (bool) ($data['is_active'] ?? true),
        );
    }

    public function toArray(): array
    {
        return [
            'name'        => $this->name,
            'slug'        => $this->slug,
            'description' => $this->description,
            'is_active'   => $this->is_active,
        ];
    }
}
