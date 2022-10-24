<?php

use Illuminate\Support\Facades\Route;
use Modules\Vehicle\Http\Controllers\InsurerController;

$controller = InsurerController::class;

Route::middleware(['Log:web.insurer', 'auth', 'AccessControl'])->prefix("insurer/")->as("insurer.")->group(function () use ($controller) {
    Route::resource('/', $controller);
    Route::get("audit/{insurer}"   ,["as" => "insurer.audit"   ,"uses" => "$controller@audit"    ]);
    Route::get("recover/{insurer}" ,["as" => "insurer.recover" ,"uses" => "$controller@recover"  ]);
    Route::get("block/{insurer}"   ,["as" => "insurer.block"   ,"uses" => "$controller@block"    ]);
    Route::get("unblock/{insurer}" ,["as" => "insurer.unblock" ,"uses" => "$controller@unblock"  ]);
});
