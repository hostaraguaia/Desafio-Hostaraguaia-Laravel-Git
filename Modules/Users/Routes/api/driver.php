<?php

use Modules\Users\Http\Controllers\DriverController;
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

$controller = DriverController::class;

Route::middleware(['Log:api.driver', 'auth:api', 'AccessControl'])->prefix("driver/")->as("driver.")->group(function () use ($controller) {
    Route::apiResource("/", $controller);
    Route::get("audit/{driver}"   ,["as" => "driver.audit"   ,"uses" => "$controller@audit"   ]);
    Route::get("recover/{driver}" ,["as" => "driver.recover" ,"uses" => "$controller@recover" ]);
    Route::get("block/{driver}"   ,["as" => "driver.block"   ,"uses" => "$controller@block"   ]);
    Route::get("unblock/{driver}" ,["as" => "driver.unblock" ,"uses" => "$controller@unblock" ]);
});
