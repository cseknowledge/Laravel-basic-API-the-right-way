<?php

namespace App\Http\Controllers\API\V1;

use App\DataTransferObjects\V1\CategoryDTO;
use App\Http\Resources\V1\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\CategoryStoreRequest;
use App\Http\Requests\V1\CategoryUpdateRequest;
use App\Http\Resources\V1\CategoryCollection;
use App\Services\V1\CategoryService;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $service)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return new CategoryCollection($this->service->all($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        return (new CategoryResource($this->service->store( $request->validated())))
                ->response()
                ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return (new CategoryResource($this->service->show($category)))->response()->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        return (new CategoryResource($this->service->update($request->validated() ,  $category)))
                ->response()
                ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->service->delete($category);
        return response()->json(null, 204);
    }
}
