<?php

namespace Crud\App\Web\Usuario\Controllers;

use Crud\App\Core\Http\Controllers\Controller;
use Crud\App\Web\Usuario\Requests\UsuarioRequest;
use Crud\Domain\Nivel\Actions\ListNivellAction;
use Crud\Domain\User\Actions\DestroyUserAction;
use Crud\Domain\User\Actions\RestoreUserAction;
use Crud\Domain\User\Actions\StoreUserAction;
use Crud\Domain\User\Actions\UpdateUserAction;
use Crud\Domain\User\Actions\ListUserAction;
use Crud\Domain\User\DTO\UserData;
use Crud\Domain\User\Models\User;

class UsuarioController extends Controller
{

    private string $rotaBase = 'usuarios';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->authorize($this->rotaBase);

        return view($this->rotaBase . '.index',[
            'items' => ListUserAction::run(),
            'rotaBase'=>$this->rotaBase
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $this->authorize($this->rotaBase . '.novo');

        return view($this->rotaBase . '.form', [
            'action' => 'Novo',
            'item' => null,
            'rotaBase' => $this->rotaBase,
            'opcoesNiveis' => ListNivellAction::run(selectOptions:true),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UsuarioRequest $request, StoreUserAction $action)
    {
        $this->authorize($this->rotaBase . '.novo');

        $data = UserData::fromRequest($request);

        if ($action($data)) {
            return redirect()->route($this->rotaBase)
                ->with('success', 'Criado com sucesso.');
        } else {
            return redirect()->back()
                ->with('error', 'Erro ao tentar cadastrar.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $this->authorize($this->rotaBase . '.ver');

        return view($this->rotaBase . '.show', [
            'rotaBase' => $this->rotaBase,
            'item' => User::query()->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->authorize($this->rotaBase . '.editar');

        return view($this->rotaBase . '.form', [
            'action' => 'Editar',
            'item' => User::query()->find($id),
            'rotaBase' => $this->rotaBase,
            'opcoesNiveis' => ListNivellAction::run(selectOptions:true),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UsuarioRequest $request, $id, UpdateUserAction $action)
    {
        $this->authorize($this->rotaBase . '.editar');

        $data = UserData::fromRequest($request);
        if ($action($data, $id)) {
            return redirect()->route($this->rotaBase)
                ->with('success', 'Alterado com sucesso.');
        } else {
            return redirect()->back()
                ->with('error', 'Erro ao tentar alterar.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->authorize($this->rotaBase . '.delete');

        if (!$id)
            return redirect()->back()->with('error', 'Erro ao tentar excluir.');

        if (DestroyUserAction::run($id)) {
            return redirect()->back()->with('success', 'Excluído com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Erro ao tentar excluir.');
        }
    }


    public function trashed()
    {
        $this->authorize($this->rotaBase . '.lixeira');

        $this->authorize($this->rotaBase);

        return view($this->rotaBase . '.index', [
            'rotaBase' => $this->rotaBase,
            'items' => ListUserAction::run(lixeira:true),
        ]);
    }

    public function restore($id)
    {
        $this->authorize($this->rotaBase . '.restaurar');

        if (!$id)
            return redirect()->back()->with('error', 'Erro ao tentar restaurar.');

        if (RestoreUserAction::run($id)) {
            return redirect()->back()->with('success', 'Restaurado com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Erro ao tentar restaurar.');
        }
    }
}
