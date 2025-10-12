<?php

namespace App\Support\Helpers;

use Illuminate\Database\Eloquent\Model;

class ActiveUuidHelper
{
    /**
     * Convert UUIDs to active IDs for any model.
     *
     * @param string $modelClass  Fully qualified model class
     * @param array $uuids        Array of UUIDs to convert
     * @param bool $throwIfInvalid
     * @return array
     */
    public static function getActiveIds(string $modelClass, array $uuids, bool $throwIfInvalid = true): array
    {
        if (!class_exists($modelClass) || !is_subclass_of($modelClass, Model::class)) {
            throw new \InvalidArgumentException("{$modelClass} must be a valid Eloquent model.");
        }

        $validIds = $modelClass::whereIn('uuid', $uuids)
            ->where('is_active', 1)
            ->whereNull('deleted_at')
            ->pluck('id')
            ->toArray();

        if ($throwIfInvalid && count($validIds) !== count($uuids)) {
            throw new \InvalidArgumentException('One or more UUIDs are invalid or inactive.');
        }

        return $validIds;
    }
}
