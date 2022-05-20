<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($data) {
                return [
                    'id'   => $data->id,
                    'name' => $data->name
                ];
            }),
            'error' => '',
            'page' => $this->currentPage(),
            'total' => $this->total(),
            'per_page' => $this->perPage()

        ];
    }
}
