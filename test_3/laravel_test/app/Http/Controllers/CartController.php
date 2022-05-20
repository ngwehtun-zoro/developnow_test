<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;
use App\Http\Requests\CartRequest;
use App\Http\Resources\CartResource;
use App\Http\Resources\CartCollection;
use App\Contracts\CartRepositoryInterface;

class CartController extends Controller
{
    use ResponseTrait;

    public function __construct(
        private CartRepositoryInterface $repository
    ) {
    }
    public function index()
    {
        $result = $this->repository->getCarts();
        if ($result->total() == 0) {
            return $this->failed('Empty Result', Response::HTTP_NOT_FOUND);
        }

        return $this->paginate(new CartCollection($result));
    }

    public function show($id)
    {
        $result = $this->repository->getCart($id);
        if (!$result) {
            return $this->failed('Empty Result', Response::HTTP_NOT_FOUND);
        }

        return $this->success(new CartResource($result));
    }

    public function store(CartRequest $request)
    {
        $result = $this->repository->createCart($request->all());
        if (!$result) {
            return $this->failed('Create Failed', Response::HTTP_NOT_ACCEPTABLE);
        }

        return $this->success("Successfully created");
    }

    public function update(Request $request, $id)
    {
        $result = $this->repository->updateCart($id, $request->all());
        if (!$result) {
            return $this->failed('Update Failed', Response::HTTP_NOT_ACCEPTABLE);
        }

        return $this->success("Successfully updated");
    }

    public function destroy($id)
    {
        $result = $this->repository->deleteCart($id);
        if (!$result) {
            return $this->failed('Delete Failed', Response::HTTP_NOT_ACCEPTABLE);
        }

        return $this->success("Successfully deleted");
    }
}
