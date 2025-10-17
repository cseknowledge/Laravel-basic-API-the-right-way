<?php

namespace App\Pipeline\Filters\Components;

use Closure;
use App\Pipeline\Filters\Components\ComponentInterface;

class Name implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        if (isset($content['params']['name'])) {
            $value = $content['params']['name'];

            $content['builder']->where('name', 'like', '%' . $value . '%');
        }

        return $next($content);
    }
}
