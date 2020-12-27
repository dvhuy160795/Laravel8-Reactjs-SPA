<?php

namespace App\Http\Controllers\Api;

use App\Core\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class AttachmentsController
 *
 * @package App\Http\Controllers\Api
 * @author  HuyDV <dvhuy160795@gmail.com>
 */
class AttachmentsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return Response::responseSusscess($request->all());
    }
}
