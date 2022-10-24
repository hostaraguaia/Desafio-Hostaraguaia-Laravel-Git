<?php

use Modules\Vehicle\Http\Controllers\InsurerController;
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

$controller = InsurerController::class;

Route::middleware(['Log:api.insurer', 'auth:api', 'AccessControl'])->prefix("vehicle/")->as("vehicle.")->group(function () use ($controller) {
    Route::apiResource("insurer", $controller);
    Route::get("insurer/{insurer}/audit"   ,["as" => "insurer.audit"   ,"uses" => "$controller@audit"   ]);
    Route::get("insurer/{insurer}/recover" ,["as" => "insurer.recover" ,"uses" => "$controller@recover" ]);
    Route::get("insurer/{insurer}/block"   ,["as" => "insurer.block"   ,"uses" => "$controller@block"   ]);
    Route::get("insurer/{insurer}/unblock" ,["as" => "insurer.unblock" ,"uses" => "$controller@unblock" ]);
});
