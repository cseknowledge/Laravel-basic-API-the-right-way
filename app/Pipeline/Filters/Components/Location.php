<?php

namespace App\Pipeline\Filters\Components;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use App\Pipeline\Filters\Components\ComponentInterface;

class Location implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        if (isset($content['params']['location'])) {
            $content['builder']->whereHas('locations', function (Builder $query) use ($content) {
                $query->where('uuid', $content['params']['location']);
            });
        }

        return $next($content);
    }
}
