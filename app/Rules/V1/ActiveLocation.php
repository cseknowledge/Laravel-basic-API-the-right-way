<?php

namespace App\Rules\V1;

use App\Models\Location;
use App\Support\Helpers\ActiveUuidHelper;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ActiveLocation implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $uuids = is_array($value) ? $value : [$value];

        try {
            $validIds = ActiveUuidHelper::getActiveIds(Location::class, $uuids);
        } catch (\InvalidArgumentException $e) {
            $fail($e->getMessage());
            return;
        }

        request()->merge([$attribute => $validIds]);
    }
}
