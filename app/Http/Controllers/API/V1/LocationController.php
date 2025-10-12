<?php

namespace App\Http\Controllers\API\V1;

use App\DataTransferObjects\V1\LocationDTO;
use App\Http\Resources\V1\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\LocationStoreRequest;
use App\Http\Requests\V1\LocationUpdateRequest;
use App\Http\Resources\V1\LocationCollection;
use App\Services\V1\LocationService;

class LocationController extends Controller
{
    public function __construct(protected LocationService $service)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return new LocationCollection($this->service->all($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationStoreRequest $request)
    {
        return (new LocationResource($this->service->store( $request->validated())))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $Location)
    {
        return (new LocationResource($this->service->show($Location)))->response()->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationUpdateRequest $request, Location $Location)
    {
        return (new LocationResource($this->service->update($request->validated() ,  $Location)))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $Location)
    {
        $this->service->delete($Location);
        return response()->json(null, 204);
    }
}
