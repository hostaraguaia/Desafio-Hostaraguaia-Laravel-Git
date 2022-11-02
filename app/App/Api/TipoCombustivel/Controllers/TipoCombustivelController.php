<?php

namespace Crud\App\Api\TipoCombustivel\Controllers;

use Crud\App\Web\TipoCombustivel\Requests\TipoCombustivelRequest;
use Crud\Domain\TipoCombustivel\Actions\DestroyTipoCombustivelAction;
use Crud\Domain\TipoCombustivel\Actions\ListTipoCombustivelAction;
use Crud\App\Core\Http\Controllers\Controller;
use Crud\Domain\TipoCombustivel\Actions\StoreTipoCombustivelAction;
use Crud\Domain\TipoCombustivel\DTO\TipoCombustivelData;
use Crud\Domain\TipoCombustivel\Models\TipoCombustivel;
use Illuminate\Http\Request;

class TipoCombustivelController extends Controller
{
    private string $rotaBase = 'combustiveis';

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
            'data' => ListTipoCombustivelAction::run(api:true),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(TipoCombustivelRequest $request, StoreTipoCombustivelAction $action)
    {
        $this->authorize($this->rotaBase . '.novo');

        $data = TipoCombustivelData::fromRequest($request);

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
            'data' => TipoCombustivel::query()->find($id),
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

        $del = DestroyTipoCombustivelAction::run($id);

        return response()->json([
            'status' => ($del === true) ? 'success' : 'error',
            'message' => ($del === true) ? 'Excluído com Sucesso' : 'Erro ao tentar excluir.'
        ]);
    }
}
