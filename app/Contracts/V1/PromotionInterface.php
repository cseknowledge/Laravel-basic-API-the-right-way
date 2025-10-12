<?php

namespace App\Contracts\V1;

use App\DataTransferObjects\V1\PromotionDTO;
use App\Models\Promotion;

interface PromotionInterface extends BaseInterface
{
    public function addingData(PromotionDTO $promotionDTO): Promotion;
    public function gettingSingleData($promotion);
    public function updatingData(PromotionDTO $promotionDTO, Promotion $promotion): Promotion;
    public function deletingData($promotion);
}
