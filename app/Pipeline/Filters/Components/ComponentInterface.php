<?php

namespace App\Pipeline\Filters\Components;

use Closure;

interface ComponentInterface
{
    public function handle(array $content, Closure $next): mixed;
}
