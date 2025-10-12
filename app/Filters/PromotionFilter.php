<?php

namespace App\Filters;

use App\Filters\Components\Category;
use App\Filters\Components\Location;
use App\Filters\Components\Status;
use App\Filters\Components\Title;

class PromotionFilter extends BaseFilter
{
    protected function getFilters(): array
    {
        return [
            Title::class,
            Category::class,
            Location::class,
            Status::class,
        ];
    }
}
