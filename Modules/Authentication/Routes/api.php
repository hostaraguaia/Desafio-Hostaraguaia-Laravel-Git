<?php

use Illuminate\Support\Facades\Route;
use Modules\Authentication\Http\Controllers\LoginController;

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

Route::as('api.login')->get('login', [LoginController::class, 'unauthorized']);
Route::as('auth.login')->post('login', [LoginController::class, 'login']);

Route::middleware(['Log:api.auth', 'auth:api', 'AccessControl'])->prefix('auth')->group(function () {
    Route::as('auth.logout')->post('logout', [LoginController::class, 'logout']);
});