<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\DriverController;

$controller = DriverController::class;

Route::middleware(['Log:web.driver', 'auth', 'AccessControl'])->prefix("driver/")->as("driver.")->group(function () use ($controller) {
    Route::resource('/', $controller);
    Route::get("audit/{driver}"   ,["as" => "driver.audit"   ,"uses" => "$controller@audit"    ]);
    Route::get("recover/{driver}" ,["as" => "driver.recover" ,"uses" => "$controller@recover"  ]);
    Route::get("block/{driver}"   ,["as" => "driver.block"   ,"uses" => "$controller@block"    ]);
    Route::get("unblock/{driver}" ,["as" => "driver.unblock" ,"uses" => "$controller@unblock"  ]);
});
