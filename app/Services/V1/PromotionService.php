<?php

namespace App\Services\V1;

use App\DataTransferObjects\V1\PromotionDTO;
use App\Models\Location;
use App\Models\Category;
use App\Models\Promotion;
use App\Support\Helpers\ActiveUuidHelper;

class PromotionService extends BaseService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->initPromotion();
    }

    public function all(array $queryParams = [])
    {
        return $this->promotionRepository->getAllData($queryParams);
    }

    public function store(array $validatedData): Promotion
    {
        $validatedData = array_merge($validatedData, ['owner_id' => auth()->id() ?? 1]);
        $validatedData['categories'] = ActiveUuidHelper::getActiveIds(Category::class, $validatedData['categories']);
        $validatedData['locations'] = ActiveUuidHelper::getActiveIds(Location::class, $validatedData['locations']);
        $promotionDTO = PromotionDTO::fromRequest($validatedData);
        return $this->promotionRepository->addData($promotionDTO);
    }

    public function show($promotion) {
        return $this->promotionRepository->getSingleData($promotion);
    }

    public function update(array $validatedData, Promotion $promotion)
    {
        $validatedData = array_merge($validatedData, ['owner_id' => $promotion->owner_id]);
        $validatedData['categories'] = ActiveUuidHelper::getActiveIds(Category::class, $validatedData['categories']);
        $validatedData['locations'] = ActiveUuidHelper::getActiveIds(Location::class, $validatedData['locations']);
        $promotionDTO = PromotionDTO::fromRequest($validatedData);
        return $this->promotionRepository->updateData($promotionDTO, $promotion);
    }

    public function delete($promotion) {
        return $this->promotionRepository->deleteData($promotion);
    }
}
