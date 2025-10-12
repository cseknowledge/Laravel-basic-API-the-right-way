<?php

namespace App\Http\Controllers\API\V1;

use App\DataTransferObjects\V1\PromotionDTO;
use App\Http\Resources\V1\PromotionResource;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\PromotionStoreRequest;
use App\Http\Requests\V1\PromotionUpdateRequest;
use App\Http\Resources\V1\PromotionCollection;
use App\Services\V1\PromotionService;

class PromotionController extends Controller
{
    public function __construct(protected PromotionService $service)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return new PromotionCollection($this->service->all($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PromotionStoreRequest $request)
    {
        return (new PromotionResource($this->service->store( $request->validated())))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        return (new PromotionResource($this->service->show($promotion)))->response()->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PromotionUpdateRequest $request, Promotion $promotion)
    {
        return (new PromotionResource($this->service->update($request->validated() ,  $promotion)))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        $this->service->delete($promotion);
        return response()->json(null, 204);
    }
}
