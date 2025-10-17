<?php

namespace App\Repositories\V1;

use App\Contracts\V1\PromotionInterface;
use App\DataTransferObjects\V1\PromotionDTO;
use App\Pipeline\Filters\PromotionFilter;
use App\Models\Promotion;

class PromotionRepository extends BaseRepository implements PromotionInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
    }

    public function gettingAllData($queryParams = [])
    {
        $queryBuilder = Promotion::with(['owner', 'categories', 'locations'])->latest();
        return resolve(PromotionFilter::class)->getResults([
            'builder' => $queryBuilder,
            'params' => $queryParams
        ]);
    }

    public function addingData(PromotionDTO $promotionDTO): Promotion
    {
        $promotion = Promotion::create($promotionDTO->toArray());
        if(isset($promotion->id)){
            $promotion->categories()->sync($promotionDTO->categories);
            $promotion->locations()->sync($promotionDTO->locations);
        }

        return $promotion->load(['owner', 'categories', 'locations']);
    }

    public function gettingSingleData($promotion): Promotion {
        $promotion = Promotion::findByIdentifier($promotion->uuid);
        $promotion->load(['owner', 'categories', 'locations']);
        return $promotion;
    }

    public function updatingData(PromotionDTO $promotionDTO, Promotion $promotion): Promotion
    {
        $promotion->update($promotionDTO->toArray());
        $promotion->categories()->sync($promotionDTO->categories);
        $promotion->locations()->sync($promotionDTO->locations);
        return $promotion->load(['owner', 'categories', 'locations']);
    }

    public function deletingData($promotion) {
        return $promotion->delete();
    }
}
