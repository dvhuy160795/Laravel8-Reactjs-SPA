<?php

/**
 *  Customize response format
 *
 * @author HuyDV  <dvhuy160795@gmail.com>
 */

namespace App\Core;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as BaseResponse;

/**
 * Class Response
 *
 * @package App\Core
 * @author  HuyDV <dvhuy160795@gmail.com>
 */
class Response
{
    public const STATUS_CONTINUE = '1';
    public const STATUS_SUCCESS  = '2';
    public const STATUS_WARNING  = '3';
    public const STATUS_FAIL     = '4';
    public const STATUS_ERROR    = '5';

    /**
     * Response data to client next step.
     *
     * @param  array  $data       : response data.
     * @param  string $statusCode : response code.
     * @return object
     * @throws Exception
     */
    public static function responseContinue(array $data, string $statusCode = BaseResponse::HTTP_CONTINUE)
    {
        self::validateStatusCode(self::STATUS_CONTINUE, $statusCode);

        $result = [
            'statusCode' => $statusCode,
            'messages'   => [BaseResponse::$statusTexts[$statusCode]],
            'data'       => $data,
        ];
        return response()->json($result, $statusCode);
    }

    /**
     * Response data to client.
     *
     * @param  array  $data       : response data.
     * @param  string $statusCode : response code.
     * @return object
     * @throws Exception
     */
    public static function responseSusscess(array $data, string $statusCode = BaseResponse::HTTP_OK)
    {
        self::validateStatusCode(self::STATUS_SUCCESS, $statusCode);

        $result = [
            'statusCode' => $statusCode,
            'messages'   => [BaseResponse::$statusTexts[$statusCode]],
            'data'       => $data,
        ];
        return response()->json($result, $statusCode);
    }

    /**
     * Response data to client.
     *
     * @param  array  $data       : response data.
     * @param  string $statusCode : response code.
     * @return object
     * @throws Exception
     */
    public static function responseWarning(array $data, string $statusCode = BaseResponse::HTTP_FOUND)
    {
        self::validateStatusCode(self::STATUS_WARNING, $statusCode);

        $result = [
            'statusCode' => $statusCode,
            'messages'   => [BaseResponse::$statusTexts[$statusCode]],
            'data'       => $data,
        ];
        return response()->json($result, $statusCode);
    }

    /**
     * Response data fail to client.
     *
     * @param  array  $data       : response data.
     * @param  string $statusCode : response code.
     * @return object
     * @throws Exception
     */
    public static function responseFail(array $data, string $statusCode = BaseResponse::HTTP_BAD_REQUEST)
    {
        self::validateStatusCode(self::STATUS_FAIL, $statusCode);

        $result = [
            'statusCode' => $statusCode,
            'messages'   => [BaseResponse::$statusTexts[$statusCode]],
            'data'       => $data,
        ];
        return response()->json($result, $statusCode);
    }

    /**
     *  Validate status code.
     *
     * @param  string $typeStatus : status's type.
     * @param  string $statusCode : status's code.
     * @return bool
     * @throws Exception
     */
    public static function validateStatusCode(string $typeStatus, string $statusCode): bool
    {
        if ($typeStatus !== $statusCode[0]) {
            throw new Exception('Status code not match with type status');
        }
        return true;
    }
}
