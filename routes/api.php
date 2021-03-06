<?php

use App\Http\Controllers\Api\AttachmentsController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token, Authorization, Accept,charset,boundary,Content-Length');
header('Access-Control-Allow-Origin: http://localhost:3000');

// Public
Route::get('public/{path}', function ($path) {

    return File::get(public_path() . '/' . $path);
});

Route::get('private/{object}/{type}/{path}', function ($object, $type, $path) {
    $path = storage_path() . '/app/' . $object . '/' . $type . '/' . $path;

    if (!File::exists($path)) {
        return "file not exist!";
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::post('auth/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->get('/', function (Request $request) {
    return $request->user();
});

Route::resource('attachments', AttachmentsController::class)->only([
    'store', 'index'
]);

Route::resource('users', UserController::class)->only([
    'index'
]);
