<?php

namespace App\Pipeline\Filters;

use App\Pipeline\Filters\Components\Category;
use App\Pipeline\Filters\Components\Location;
use App\Pipeline\Filters\Components\Status;
use App\Pipeline\Filters\Components\Title;
use App\Pipeline\BasePipeline;

class PromotionFilter extends BasePipeline
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
