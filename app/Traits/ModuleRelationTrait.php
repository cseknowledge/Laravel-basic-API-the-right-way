<?php

namespace App\Traits;

use App\Filters\Components\Location;
use App\Models\Category;
use App\Models\Promotion;
use App\Repositories\V1\CategoryRepository;
use App\Repositories\V1\LocationRepository;
use App\Repositories\V1\PromotionRepository;

trait ModuleRelationTrait
{
    protected Category $category;
    protected Location $location;
    protected Promotion $promotion;
    protected CategoryRepository $categoryRepository;
    protected LocationRepository $locationRepository;
    protected PromotionRepository $promotionRepository;

    public function initCategory(): void
    {
        $this->category = new Category();
        $this->categoryRepository = new CategoryRepository();
    }

    public function initLocation(): void
    {
        $this->location = new Location();
        $this->locationRepository = new LocationRepository();
    }

    public function initPromotion(): void
    {
        $this->promotion = new Promotion();
        $this->promotionRepository = new PromotionRepository();
    }

}
