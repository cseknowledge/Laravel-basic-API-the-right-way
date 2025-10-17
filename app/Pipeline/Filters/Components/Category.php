<?php

namespace App\Pipeline\Filters\Components;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use App\Pipeline\Filters\Components\ComponentInterface;

class Category implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        if (isset($content['params']['category'])) {
            $content['builder']->whereHas('categories', function (Builder $query) use ($content) {
                $query->where('uuid', $content['params']['category']);
            });
        }

        return $next($content);
    }
}
