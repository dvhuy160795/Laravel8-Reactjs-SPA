<?php

namespace App\Http\Controllers\Api;

use App\Core\Response;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * User's service.
     *
     * @var UserService
     */
    private $userService;

    /**
     * UserController constructor.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return object
     * @throws \Exception
     */
    public function index()
    {
        $users = $this->userService->getUsers();
        return Response::responseSusscess($users);
    }
}
