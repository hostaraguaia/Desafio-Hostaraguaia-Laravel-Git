<?php

use Modules\Users\Http\Controllers\UserController;
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

$controller = UserController::class;

Route::middleware(['Log:api.user', 'auth:api', 'AccessControl'])->prefix("users/")->as("users.")->group(function () use ($controller) {
    Route::apiResource("user", $controller);
    Route::get("user/{user}/audit"   ,["as" => "user.audit"   ,"uses" => "$controller@audit"   ]);
    Route::get("user/{user}/recover" ,["as" => "user.recover" ,"uses" => "$controller@recover" ]);
    Route::get("user/{user}/block"   ,["as" => "user.block"   ,"uses" => "$controller@block"   ]);
    Route::get("user/{user}/unblock" ,["as" => "user.unblock" ,"uses" => "$controller@unblock" ]);
});
