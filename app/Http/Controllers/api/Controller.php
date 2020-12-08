<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Core\Response as CoreResponse;

class Controller extends BaseController
{
    /**
     * Response data to client next step
     *
     * @param  array $data
     * @param  int   $statusCode
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \Exception
     */
    protected function responseContinue(array $data, $statusCode = Response::HTTP_CONTINUE)
    {
        return CoreResponse::responseContinue($data, $statusCode);
    }

    /**
     * Response data to client
     *
     * @param  array $data
     * @param  int   $statusCode
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \Exception
     */
    protected function responseSusscess(array $data, $statusCode = Response::HTTP_OK)
    {
        return CoreResponse::responseSusscess($data, $statusCode);
    }

    /**
     * Response data to client
     *
     * @param  array $data
     * @param  int   $statusCode
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \Exception
     */
    protected function responseWarning(array $data, $statusCode = Response::HTTP_FOUND)
    {
        return CoreResponse::responseWarning($data, $statusCode);
    }

    /**
     * Response data fail to client
     *
     * @param  array $data
     * @param  int   $statusCode
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \Exception
     */
    protected function responseFail(array $data, $statusCode = Response::HTTP_BAD_REQUEST)
    {
        return CoreResponse::responseFail($data, $statusCode);
    }
}
