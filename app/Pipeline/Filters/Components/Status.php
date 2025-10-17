<?php

namespace App\Pipeline\Filters\Components;

use Closure;
use App\Pipeline\Filters\Components\ComponentInterface;

class Status implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        if (isset($content['params']['status'])) {
            $content['builder']->where('status', $content['params']['status']);
        }

        return $next($content);
    }
}
