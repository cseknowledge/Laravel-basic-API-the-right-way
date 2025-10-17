<?php

namespace App\Pipeline\Filters;

use App\Pipeline\Filters\Components\Name;
use App\Pipeline\Filters\Components\Active;
use App\Pipeline\BasePipeline;

class LocationFilter extends BasePipeline
{
    protected function getFilters(): array
    {
        return [
            Name::class,
            Active::class,
        ];
    }
}
