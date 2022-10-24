<?php

use Modules\Contact\Http\Controllers\AddressController;
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

$controller = AddressController::class;

Route::middleware(['Log:api.address', 'auth:api', 'AccessControl'])->prefix("contact/")->as("contact.")->group(function () use ($controller) {
    Route::apiResource("address", $controller);
    Route::get("address/{address}/audit"   ,["as" => "address.audit"   ,"uses" => "$controller@audit"   ]);
    Route::get("address/{address}/recover" ,["as" => "address.recover" ,"uses" => "$controller@recover" ]);
    Route::get("address/{address}/block"   ,["as" => "address.block"   ,"uses" => "$controller@block"   ]);
    Route::get("address/{address}/unblock" ,["as" => "address.unblock" ,"uses" => "$controller@unblock" ]);
});
