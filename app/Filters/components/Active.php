<?php

declare(strict_types=1);

namespace App\Filters\Components;

use Closure;

class Active implements ComponentInterface
{
    public function handle(array $content, Closure $next): mixed
    {
        if (isset($content['params']['active'])) {
            $content['builder']->where('is_active', $content['params']['active']);
        }

        return $next($content);
    }
}
