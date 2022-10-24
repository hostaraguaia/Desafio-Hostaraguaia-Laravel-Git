<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\AttendantController;

$controller = AttendantController::class;

Route::middleware(['Log:web.attendant', 'auth', 'AccessControl'])->prefix("attendant/")->as("attendant.")->group(function () use ($controller) {
    Route::resource('/', $controller);
    Route::get("audit/{attendant}"   ,["as" => "attendant.audit"   ,"uses" => "$controller@audit"    ]);
    Route::get("recover/{attendant}" ,["as" => "attendant.recover" ,"uses" => "$controller@recover"  ]);
    Route::get("block/{attendant}"   ,["as" => "attendant.block"   ,"uses" => "$controller@block"    ]);
    Route::get("unblock/{attendant}" ,["as" => "attendant.unblock" ,"uses" => "$controller@unblock"  ]);
});
