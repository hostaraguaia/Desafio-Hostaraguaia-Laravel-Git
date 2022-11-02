<?php

namespace Crud\App\Api\Usuario\Controllers;

use Crud\App\Core\Http\Controllers\Controller;
use Crud\App\Web\Usuario\Requests\UsuarioRequest;
use Crud\Domain\User\Actions\DestroyUserAction;
use Crud\Domain\User\Actions\ListUserAction;
use Crud\Domain\User\Actions\StoreUserAction;
use Crud\Domain\User\DTO\UserData;
use Crud\Domain\User\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    private string $rotaBase = 'usuarios';

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
            'data' => ListUserAction::run(api:true),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request, StoreUserAction $action)
    {
        $this->authorize($this->rotaBase . '.novo');

        $data = UserData::fromRequest($request);

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
            'data' => User::query()->find($id),
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

        $del = DestroyUserAction::run($id);

        return response()->json([
            'status' => ($del === true) ? 'success' : 'error',
            'message' => ($del === true) ? 'Excluído com Sucesso' : 'Erro ao tentar excluir.'
        ]);
    }
}
