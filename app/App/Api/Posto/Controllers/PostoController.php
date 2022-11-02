<?php

namespace Crud\App\Api\Posto\Controllers;

use Crud\App\Core\Classes\RegistraUsuario;
use Crud\App\Core\Http\Controllers\Controller;
use Crud\App\Web\Posto\Requests\PostoRequest;
use Crud\Domain\Posto\Actions\DestroyPostoAction;
use Crud\Domain\Posto\Actions\ListPostoAction;
use Crud\Domain\Posto\Actions\StorePostoAction;
use Crud\Domain\Posto\DTO\PostoData;
use Crud\Domain\Posto\Models\Posto;
use Illuminate\Http\Request;

class PostoController extends Controller
{
    private string $rotaBase = 'postos';

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
            'data' => ListPostoAction::run(api:true),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(PostoRequest $request, StorePostoAction $action)
    {
        $this->authorize($this->rotaBase . '.novo');

        $registraUsuario = RegistraUsuario::registra($request, 3, 'nome_fantasia');

        if ($registraUsuario->success === false) {
            return response()->json([
                'status' => 'error',
                'data' => $registraUsuario->message,
            ]);
        }

        $request->merge(['user_id' => $registraUsuario->id]);

        $data = PostoData::fromRequest($request);

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
            'data' => Posto::query()->find($id),
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

        $del = DestroyPostoAction::run($id);

        return response()->json([
            'status' => ($del === true) ? 'success' : 'error',
            'message' => ($del === true) ? 'Excluído com Sucesso' : 'Erro ao tentar excluir.'
        ]);
    }
}
