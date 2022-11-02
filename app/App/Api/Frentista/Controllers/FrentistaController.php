<?php

namespace Crud\App\Api\Frentista\Controllers;

use Crud\App\Core\Classes\RegistraUsuario;
use Crud\App\Web\Frentista\Requests\FrentistaRequest;
use Crud\Domain\Frentista\Actions\DestroyFrentistaAction;
use Crud\Domain\Frentista\Actions\ListFrentistaAction;
use Crud\App\Core\Http\Controllers\Controller;
use Crud\Domain\Frentista\Actions\StoreFrentistaAction;
use Crud\Domain\Frentista\DTO\FrentistaData;
use Crud\Domain\Frentista\Models\Frentista;
use Illuminate\Http\Request;

class FrentistaController extends Controller
{
    private string $rotaBase = 'frentistas';

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
            'data' => ListFrentistaAction::run(api:true),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(FrentistaRequest $request, StoreFrentistaAction $action)
    {
        $this->authorize($this->rotaBase . '.novo');

        $registraUsuario = RegistraUsuario::registra($request, 4, 'nome');

        if ($registraUsuario->success === false) {
            return response()->json([
                'status' => 'error',
                'data' => $registraUsuario->message,
            ]);
        }

        $request->merge(['user_id' => $registraUsuario->id]);

        $data = FrentistaData::fromRequest($request);

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
            'data' => Frentista::query()->find($id),
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

        $del = DestroyFrentistaAction::run($id);

        return response()->json([
            'status' => ($del === true) ? 'success' : 'error',
            'message' => ($del === true) ? 'Excluído com Sucesso' : 'Erro ao tentar excluir.'
        ]);
    }
}
