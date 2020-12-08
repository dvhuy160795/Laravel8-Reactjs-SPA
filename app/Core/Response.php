<?php

namespace App\Core;

use Symfony\Component\HttpFoundation\Response as BaseResponse;

class Response
{
    const STATUS_CONTINUE = '1';
    const STATUS_SUCCESS = '2';
    const STATUS_WARNING = '3';
    const STATUS_FAIL = '4';
    const STATUS_ERROR = '5';

    /**
     * Response data to client next step
     *
     * @param  array $data
     * @param  int   $statusCode
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \Exception
     */
    public static function responseContinue(array $data, $statusCode = BaseResponse::HTTP_CONTINUE)
    {
        self::validateStatusCode(self::STATUS_CONTINUE, $statusCode);

        $result = [
            'statusCode' => $statusCode,
            'message' => BaseResponse::$statusTexts[$statusCode],
            'data' => $data
        ];
        return response()->json($result, $statusCode);
    }

    /**
     * Response data to client
     *
     * @param  array $data
     * @param  int   $statusCode
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \Exception
     */
    public static function responseSusscess(array $data, $statusCode = BaseResponse::HTTP_OK)
    {
        self::validateStatusCode(self::STATUS_SUCCESS, $statusCode);

        $result = [
            'statusCode' => $statusCode,
            'message' => BaseResponse::$statusTexts[$statusCode],
            'data' => $data
        ];
        return response()->json($result, $statusCode);
    }

    /**
     * Response data to client
     *
     * @param  array $data
     * @param  int   $statusCode
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \Exception
     */
    public static function responseWarning(array $data, $statusCode = BaseResponse::HTTP_FOUND)
    {
        self::validateStatusCode(self::STATUS_WARNING, $statusCode);

        $result = [
            'statusCode' => $statusCode,
            'message' => BaseResponse::$statusTexts[$statusCode],
            'data' => $data
        ];
        return response()->json($result, $statusCode);
    }

    /**
     * Response data fail to client
     *
     * @param  array $data
     * @param  int   $statusCode
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \Exception
     */
    public static function responseFail(array $data, $statusCode = BaseResponse::HTTP_BAD_REQUEST)
    {
        self::validateStatusCode(self::STATUS_FAIL, $statusCode);

        $result = [
            'statusCode' => $statusCode,
            'message' => BaseResponse::$statusTexts[$statusCode],
            'data' => $data
        ];
        return response()->json($result, $statusCode);
    }

    /**
     *  Validate status code
     *
     * @param  $typeStatus
     * @param  $statusCode
     * @throws \Exception
     */
    public static function validateStatusCode($typeStatus, string $statusCode)
    {
        if ($typeStatus !== $statusCode[0]) {
            throw new \Exception('Status code not match with type status');
        }
    }
}
