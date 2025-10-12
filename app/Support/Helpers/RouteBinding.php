<?php

namespace App\Support\Helpers;

use Illuminate\Support\Facades\Route;
use App\Models\{User, Category, Location, Promotion};

class RouteBinding
{
    public static function bindUuidOrSlug(string $name, string $modelClass): void
    {
        Route::bind($name, function ($value) use ($modelClass) {
            if($modelClass === 'App\Models\User') {
                return $modelClass::where('uuid', $value)
                    ->firstOrFail();
            }
            return $modelClass::where('uuid', $value)
                ->orWhere('slug', $value)
                // ->orWhere('id', $value)
                ->firstOrFail();
        });
    }

    public static function register(): void
    {
        self::bindUuidOrSlug('user', User::class);
        self::bindUuidOrSlug('category', Category::class);
        self::bindUuidOrSlug('location', Location::class);
        self::bindUuidOrSlug('promotion', Promotion::class);
    }
}
