<?php

namespace App\Http\Requests\api;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class Request extends FormRequest
{
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                 'data' => null,
                 'statusCode' => Response::HTTP_FOUND,
                 'messages' => $validator->errors()->all()
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            )
        );
    }
}
