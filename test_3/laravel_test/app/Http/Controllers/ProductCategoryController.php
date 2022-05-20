<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;
use App\Contracts\CategoryRepositoryInterface;
use App\Http\Requests\CategoryRequest;

class ProductCategoryController extends Controller
{
    use ResponseTrait;

    public function __construct(
        private CategoryRepositoryInterface $repository
    ) {
    }
    public function index()
    {
        $result = $this->repository->getCategories();
        if ($result->total() == 0) {
            return $this->failed('Empty Result', Response::HTTP_NOT_FOUND);
        }

        return $this->paginate(new CategoryCollection($result));
    }

    public function show($id)
    {
        $result = $this->repository->getCategory($id);
        if (!$result) {
            return $this->failed('Empty Result', Response::HTTP_NOT_FOUND);
        }

        return $this->success(new CategoryResource($result));
    }

    public function store(CategoryRequest $request)
    {
        $result = $this->repository->createCategory($request->all());
        if (!$result) {
            return $this->failed('Create Failed', Response::HTTP_NOT_ACCEPTABLE);
        }

        return $this->success("Successfully created");
    }

    public function update(Request $request, $id)
    {
        $result = $this->repository->updateCategory($id, $request->all());
        if (!$result) {
            return $this->failed('Update Failed', Response::HTTP_NOT_ACCEPTABLE);
        }

        return $this->success("Successfully updated");
    }

    public function destroy($id)
    {
        $result = $this->repository->deleteCategory($id);
        if (!$result) {
            return $this->failed('Delete Failed', Response::HTTP_NOT_ACCEPTABLE);
        }

        return $this->success("Successfully deleted");
    }
}
