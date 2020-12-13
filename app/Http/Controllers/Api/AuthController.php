<?php

namespace App\Http\Controllers\Api;

use App\Core\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\Auth\Register;
use App\Http\Requests\api\Auth\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    /**
     * @var UserService
     */
    private $userService;

    /**
     * AuthController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(RegisterRequest $registerRequest)
    {
        $data = $registerRequest->all();
        if ($registerRequest->file('photo')) {
            $data['photo_path'] = $registerRequest->photo->store('user/photo');
        }
        $result = $this->userService->create($data);

        if (!$result) {
            return Response::responseFail(['message' => 'Insert Fail!!!']);
        }

        return Response::responseSusscess($result);
    }
}
