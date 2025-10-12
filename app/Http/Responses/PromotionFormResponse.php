<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;

class PromotionFormResponse implements Responsable
{

    /**
     * @inheritDoc
     */
    public function toResponse($request)
    {
        dd($request);
    }
}
