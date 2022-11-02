<?php

namespace Crud\App\Api\Veiculo\Controllers;

use Crud\App\Web\Veiculo\Requests\VeiculoRequest;
use Crud\Domain\Veiculo\Actions\DestroyVeiculoAction;
use Crud\Domain\Veiculo\Actions\ListVeiculoAction;
use Crud\App\Core\Http\Controllers\Controller;
use Crud\Domain\Veiculo\Actions\StoreVeiculoAction;
use Crud\Domain\Veiculo\DTO\VeiculoData;
use Crud\Domain\Veiculo\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    private string $rotaBase = 'veiculos';

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
            'data' => ListVeiculoAction::run(api:true),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(VeiculoRequest $request, StoreVeiculoAction $action)
    {
        $this->authorize($this->rotaBase . '.novo');

        $data = VeiculoData::fromRequest($request);

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
            'data' => Veiculo::query()->find($id),
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

        $del = DestroyVeiculoAction::run($id);

        return response()->json([
            'status' => ($del === true) ? 'success' : 'error',
            'message' => ($del === true) ? 'Excluído com Sucesso' : 'Erro ao tentar excluir.'
        ]);
    }
}
