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
            response()->json([
                 'data' => null,
                 'code' => Response::HTTP_FOUND,
                 'message' => $validator->errors()->all()[0]
             ], Response::HTTP_INTERNAL_SERVER_ERROR)
        );
    }
}
