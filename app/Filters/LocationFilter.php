<?php

namespace App\Filters;

use App\Filters\Components\Name;
use App\Filters\Components\Active;

class LocationFilter extends BaseFilter
{
    protected function getFilters(): array
    {
        return [
            Name::class,
            Active::class,
        ];
    }
}
