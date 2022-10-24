<?php

use Modules\Users\Http\Controllers\AttendantController;
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

$controller = AttendantController::class;

Route::middleware(['Log:api.attendant', 'auth:api', 'AccessControl'])->prefix("users/")->as("users.")->group(function () use ($controller) {
    Route::apiResource("attendant", $controller);
    Route::get("attendant/{attendant}/audit"   ,["as" => "attendant.audit"   ,"uses" => "$controller@audit"   ]);
    Route::get("attendant/{attendant}/recover" ,["as" => "attendant.recover" ,"uses" => "$controller@recover" ]);
    Route::get("attendant/{attendant}/block"   ,["as" => "attendant.block"   ,"uses" => "$controller@block"   ]);
    Route::get("attendant/{attendant}/unblock" ,["as" => "attendant.unblock" ,"uses" => "$controller@unblock" ]);
});
