<?php

namespace App\Rules\V1;

use App\Models\Category;
use App\Support\Helpers\ActiveUuidHelper;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ActiveCategory implements ValidationRule
{
    public function __construct()
    {
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $uuids = is_array($value) ? $value : [$value];

        try {
            $validIds = ActiveUuidHelper::getActiveIds(Category::class, $uuids);
        } catch (\InvalidArgumentException $e) {
            $fail($e->getMessage());
            return;
        }

        request()->merge([$attribute => $validIds]);
    }
}
