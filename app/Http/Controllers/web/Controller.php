<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller as BaseController;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $userService;
    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function testBase()
    {

    }
}
