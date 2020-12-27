<?php

namespace App\Http\Controllers\Api;

use App\Core\Response;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\api\Auth\Register;
use App\Http\Requests\api\Auth\RegisterRequest;
use App\Jobs\InfinityJob;
use App\Jobs\SendMail;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers\Api
 * @author  HuyDV <dvhuy160795@gmail.com>
 */
class AuthController extends Controller
{

    /**
     * User's service
     *
     * @var UserService
     */
    private $userService;

    /**
     * AuthController constructor.
     *
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

        return back()->withErrors(
            ['email' => 'The provided credentials do not match our records.']
        );
    }

    /**
     * Register new user
     *
     * @param  RegisterRequest $registerRequest
     * @return \Illuminate\Http\JsonResponse|object
     * @throws \Exception
     */
    public function register(RegisterRequest $registerRequest)
    {
        $data = $registerRequest->all();
        if ($registerRequest->file('photo')) {
            $data['photo_path'] = $registerRequest->photo->store('user/photo');
        }
        $result = $this->userService->create($data);

        if (!$result) {
            return Response::responseFail(['message' => ['Insert Fail!!!']]);
        }

        $infinityJob = new InfinityJob();
        dispatch($infinityJob)->onQueue('infinity-job');
        return Response::responseSusscess($result);
    }
}
