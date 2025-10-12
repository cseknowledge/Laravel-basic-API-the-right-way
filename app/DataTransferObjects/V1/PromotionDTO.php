<?php

namespace App\DataTransferObjects\V1;

use App\Support\Constants\Role;
use App\Support\Constants\Status;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Double;

class PromotionDTO
{
    public function __construct(
        public string $title,
        public string $slug,
        public ?string $description,
        public float $price,
        public int $owner_id,
        public string $status,
        public bool $is_approved,
        public array $categories = [],
        public array $locations = []
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            $data['title'],
            Str::slug(title: $data['title']),
            $data['description'] ?? null,
            (float) $data['price'] ?? 0.00,
            $data['owner_id'],
            $data['status'] ?? Status::DRAFT,
            (bool) ($data['is_approved'] ?? true),
            $data['categories'] ?? [],
            $data['locations'] ?? []
        );
    }

    public function toArray(): array
    {
        return [
            'title'          => $this->title,
            'slug'          => $this->slug,
            'description'   => $this->description,
            'price'         => $this->price,
            'owner_id'      => $this->owner_id,
            'status'        => $this->status,
            'is_approved'   => $this->is_approved,
        ];
    }
}
