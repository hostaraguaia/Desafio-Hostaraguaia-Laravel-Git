<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/permissoes', '\Crud\App\Web\Permissao\Controllers\PermissaoController@index')->name('permissoes');

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
        Route::controller("\Crud\App\Web\\$nomeController\Controllers\\{$nomeController}Controller")->group(function () use ($rotaBase) {
            Route::get($rotaBase, 'index')->name($rotaBase);
            Route::get($rotaBase . '/novo', 'create')->name($rotaBase . '.novo');
            Route::post($rotaBase . '/novo', 'store')->name($rotaBase . '.novo');
            Route::get($rotaBase . '/editar/{id}', 'edit')->name($rotaBase . '.editar');
            Route::put($rotaBase . '/editar/{id}', 'update')->name($rotaBase . '.editar');
            Route::get($rotaBase . '/delete/{id}', 'destroy')->name($rotaBase . '.delete');
            Route::get($rotaBase . '/lixeira', 'trashed')->name($rotaBase . '.lixeira');
            Route::get($rotaBase . '/restaurar/{id}', 'restore')->name($rotaBase . '.restaurar');
            Route::get($rotaBase . '/show/{id}', 'show')->name($rotaBase . '.ver');

            if($rotaBase==='motoristas')
                Route::get($rotaBase . '/relatorio', 'relatorio')->name($rotaBase . '.relatorio');
        });
    }
    #endregion
});
require __DIR__ . '/auth.php';
