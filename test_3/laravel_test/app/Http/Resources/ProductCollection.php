<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'error' => '',
            'page' => $this->currentPage(),
            'total' => $this->total(),
            'per_page' => $this->perPage()
        ];
    }
}
