<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\UserController;

$controller = UserController::class;

Route::middleware(['Log:api.user.create'])->post('register' ,['as' => 'user.register' ,'uses' => "$controller@store" ]);

Route::middleware(['Log:api.user', 'auth:api', 'AccessControl'])->prefix('user')->group(function () use ($controller) {
    Route::get('list'                ,['as' => 'user.index'       ,'uses' => "$controller@index"       ]);
    Route::get('search/{user?}'      ,['as' => 'user.show'        ,'uses' => "$controller@show"        ]);
    Route::put('update/{user?}'      ,['as' => 'user.update'      ,'uses' => "$controller@update"      ]);
    Route::delete('destroy/{user?}'  ,['as' => 'user.destroy'     ,'uses' => "$controller@destroy"     ]);
    Route::get('permission/{user?}'  ,['as' => 'user.permission'  ,'uses' => "$controller@permission"  ]);
    Route::get('information/{user?}' ,['as' => 'user.information' ,'uses' => "$controller@information" ]);
    Route::get('audit/{user?}'       ,['as' => 'user.audit'       ,'uses' => "$controller@audit"       ]);
    Route::get('recover/{user?}'     ,['as' => 'user.recover'     ,'uses' => "$controller@recover"     ]);
    Route::get('block/{user?}'       ,['as' => 'user.block'       ,'uses' => "$controller@block"       ]);
    Route::get('unblock/{user?}'     ,['as' => 'user.unblock'     ,'uses' => "$controller@unblock"     ]);
});
