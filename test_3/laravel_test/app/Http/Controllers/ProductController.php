<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Contracts\ProductRepositoryInterface;

class ProductController extends Controller
{
    use ResponseTrait;

    public function __construct(
        private ProductRepositoryInterface $repository
    ) {
    }

    public function index()
    {
        $result = $this->repository->getProducts();
        if ($result->total() == 0) {
            return $this->failed('Empty Result', Response::HTTP_NOT_FOUND);
        }

        return $this->paginate(new ProductCollection($result));
    }

    public function store(ProductRequest $request)
    {
        $result = $this->repository->createProduct($request->all());
        if (!$result) {
            return $this->failed('Create Failed', Response::HTTP_NOT_ACCEPTABLE);
        }

        return $this->success("Successfully created");
    }

    public function show($id)
    {
        $result = $this->repository->getProduct($id);
        if (!$result) {
            return $this->failed('Empty Result', Response::HTTP_NOT_FOUND);
        }

        return $this->success(new ProductResource($result));
    }

    public function update(Request $request, $id)
    {
        $result = $this->repository->updateProduct($id, $request->all());
        if (!$result) {
            return $this->failed('Update Failed', Response::HTTP_NOT_ACCEPTABLE);
        }

        return $this->success("Successfully updated");
    }

    public function destroy($id)
    {
        $result = $this->repository->deleteProduct($id);
        if (!$result) {
            return $this->failed('Delete Failed', Response::HTTP_NOT_ACCEPTABLE);
        }

        return $this->success("Successfully deleted");
    }
}
