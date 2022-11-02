<?php

namespace Crud\App\Api\Motorista\Controllers;

use Crud\App\Core\Classes\RegistraUsuario;
use Crud\App\Web\Motorista\Requests\MotoristaRequest;
use Crud\Domain\Motorista\Actions\DestroyMotoristaAction;
use Crud\Domain\Motorista\Actions\ListMotoristaAction;
use Crud\App\Core\Http\Controllers\Controller;
use Crud\Domain\Motorista\Actions\StoreMotoristaAction;
use Crud\Domain\Motorista\DTO\MotoristaData;
use Crud\Domain\Motorista\Models\Motorista;
use Illuminate\Http\Request;

class MotoristaController extends Controller
{
    private string $rotaBase = 'motoristas';

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize($this->rotaBase);

        return response()->json([
            'status' => 'success',
            'data' => ListMotoristaAction::run(api:true),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(MotoristaRequest $request, StoreMotoristaAction $action)
    {
        $this->authorize($this->rotaBase . '.novo');

        $registraUsuario = RegistraUsuario::registra($request, 3, 'nome');

        if ($registraUsuario->success === false) {
            return response()->json([
                'status' => 'error',
                'data' => $registraUsuario->message,
            ]);
        }

        $request->merge(['user_id' => $registraUsuario->id]);

        $data = MotoristaData::fromRequest($request);

        return response()->json([
            'status' => 'success',
            'data' => $action($data),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize($this->rotaBase . '.ver');

        return response()->json([
            'status' => 'success',
            'data' => Motorista::query()->find($id),
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize($this->rotaBase . '.delete');

        if(!$id)
            return response()->json([
                'status' => 'error',
                'message' => 'Informe o Id',
            ]);

        $del = DestroyMotoristaAction::run($id);

        return response()->json([
            'status' => ($del === true) ? 'success' : 'error',
            'message' => ($del === true) ? 'Excluído com Sucesso' : 'Erro ao tentar excluir.'
        ]);
    }

}
