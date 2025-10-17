<?php

namespace App\Pipeline\Filters\Components;

use Closure;
use App\Pipeline\Filters\Components\ComponentInterface;

class Title implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        if (isset($content['params']['title'])) {
            $value = $content['params']['title'];

            $content['builder']->where('title', 'like', '%' . $value . '%');
        }

        return $next($content);
    }
}
