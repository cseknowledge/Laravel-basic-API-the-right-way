<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Schema;

trait FindByIdentifier
{
    public static function findByIdentifier(string $value)
    {
        $query = static::query();

        if (Schema::hasColumn((new static)->getTable(), 'uuid')) {
            $query->orWhere('uuid', $value);
        }

        if (Schema::hasColumn((new static)->getTable(), 'slug')) {
            $query->orWhere('slug', $value);
        }

        $query->orWhere('id', $value);

        return $query->firstOr(function () {
            throw (new ModelNotFoundException)->setModel(static::class);
        });
    }
}
