<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CartCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($data) {
                return [
                    'id'         => $data->id,
                    'product_id' => $data->product_id
                ];
            }),
            'error' => '',
            'page' => $this->currentPage(),
            'total' => $this->total(),
            'per_page' => $this->perPage()

        ];
    }
}
