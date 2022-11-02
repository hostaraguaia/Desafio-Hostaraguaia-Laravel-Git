<?php

use Illuminate\Http\Request;
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

Route::controller(\Crud\App\Api\Auth\Controllers\AuthController::class)->group(function (){
    Route::post('login','login');
});

$rotas = [
    'usuarios' => 'Usuario',
    'postos'=> 'Posto',
    'frentistas'=> 'Frentista',
    'motoristas' => 'Motorista',
    'veiculos'=> 'Veiculo',
    'combustiveis'=> 'TipoCombustivel',
];

#region Rotas
foreach ($rotas as $rotaBase => $nomeController) {
    Route::controller("\Crud\App\Api\\$nomeController\Controllers\\{$nomeController}Controller")->group(function () use ($rotaBase) {
        Route::get($rotaBase, 'index')->name($rotaBase);
        Route::post($rotaBase . '/store', 'store')->name($rotaBase . '.novo');
        Route::delete($rotaBase . '/destroy/{id}', 'destroy')->name($rotaBase . '.delete');
        Route::get($rotaBase . '/show/{id}', 'show')->name($rotaBase . '.ver');

        if($rotaBase==='motoristas')
            Route::get($rotaBase . '/relatorio', 'relatorio')->name($rotaBase . '.relatorio');
    });
}
#endregion

