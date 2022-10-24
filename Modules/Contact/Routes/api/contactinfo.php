<?php

use Modules\Contact\Http\Controllers\ContactInfoController;
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

$controller = ContactInfoController::class;

Route::middleware(['Log:api.contactinfo', 'auth:api', 'AccessControl'])->prefix("contact/")->as("contact.")->group(function () use ($controller) {
    Route::apiResource("contactinfo", $controller);
    Route::get("contactinfo/{contactinfo}/audit"   ,["as" => "contactinfo.audit"   ,"uses" => "$controller@audit"   ]);
    Route::get("contactinfo/{contactinfo}/recover" ,["as" => "contactinfo.recover" ,"uses" => "$controller@recover" ]);
    Route::get("contactinfo/{contactinfo}/block"   ,["as" => "contactinfo.block"   ,"uses" => "$controller@block"   ]);
    Route::get("contactinfo/{contactinfo}/unblock" ,["as" => "contactinfo.unblock" ,"uses" => "$controller@unblock" ]);
});
