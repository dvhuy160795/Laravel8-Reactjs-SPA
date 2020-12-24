<?php

/**
 *  Web's base controller.
 *
 * @author HuyDV  <dvhuy160795@gmail.com>
 */

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller as BaseController;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * Class Controller.
 *
 * @package App\Http\Controllers\web
 * @author  HuyDV  <dvhuy160795@gmail.com>
 */
class Controller extends BaseController
{

    /**
     * User's service.
     *
     * @var UserService
     */
    protected $userService;

    /**
     * UserController constructor.
     *
     * @param UserService $userService : Service for process user logic.
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
}
