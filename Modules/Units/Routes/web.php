<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Respect the following s while creating new route files:
|   
| File Name
| route_description.php
|
| File Content: 
|
| <?php
|   use App\Http\Controllers\Controller;
|   use Illuminate\Support\Facades\Route;
|
|
|   Route::prefix('route_description')->group(function() {
|       Route::get('/', [Controller::class, 'index']);
|   });
*/

use Modules\Utils\Utilitaries\Routes;

Routes::RequirePath(__DIR__.'/web');