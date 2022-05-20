<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

trait ResponseTrait
{
    public function success($data)
    {
        Log::info('data' . print_r($data, true));
        return response()->json(
            [
                'data' => $data,
                'error' => ''
            ]
        );
    }

    public function failed(string $message, int $status)
    {
        return response()->json(
            [
                'data' => [],
                'error' => $message
            ]
        );
    }

    public function paginate($data)
    {
        return response()->json(
            $data,
            Response::HTTP_OK
        );
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'data' => [],
                'error' => $validator->errors()->first()
            ],
            Response::HTTP_NOT_ACCEPTABLE
        ));
    }
}
