<?php

namespace Crud\App\Web\Posto\Controllers;


use Crud\App\Core\Classes\RegistraUsuario;
use Crud\App\Core\Http\Controllers\Controller;
use Crud\App\Web\Posto\Requests\PostoRequest;
use Crud\Domain\Posto\Actions\DestroyPostoAction;
use Crud\Domain\Posto\Actions\ListPostoAction;
use Crud\Domain\Posto\Actions\RestorePostoAction;
use Crud\Domain\Posto\Actions\StorePostoAction;
use Crud\Domain\Posto\Actions\UpdatePostoAction;
use Crud\Domain\Posto\DTO\PostoData;
use Crud\Domain\Posto\Models\Posto;



class PostoController extends Controller
{
    private string $rotaBase = 'postos';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->authorize($this->rotaBase);

        return view($this->rotaBase . '.index', [
            'rotaBase' => $this->rotaBase,
            'items' => ListPostoAction::run(),
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
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostoRequest $request, StorePostoAction $action)
    {
        $this->authorize($this->rotaBase . '.novo');

        $registraUsuario = RegistraUsuario::registra($request, 3, 'nome_fantasia');
        if ($registraUsuario->success === false) {
            return redirect()->back()->with('error', 'Erro ao tentar cadastrar.<br>' . $registraUsuario->message)->withInput();
        }


        if ($registraUsuario->success === true) {
            $request->merge(['user_id' => $registraUsuario->id]);

            $data = PostoData::fromRequest($request);

            if ($action($data)) {
                return redirect()->route($this->rotaBase)
                    ->with('success', 'Criado com sucesso.');
            } else {
                return redirect()->back()
                    ->with('error', 'Erro ao tentar cadastrar.');
            }
        } else {
            return redirect()->back()->with('error', 'Erro ao tentar cadastrar.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $this->authorize($this->rotaBase . '.ver');

        return view($this->rotaBase . '.show', [
            'rotaBase' => $this->rotaBase,
            'item' => Posto::query()->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $this->authorize($this->rotaBase . '.editar');

        return view($this->rotaBase . '.form', [
            'action' => 'Editar',
            'item' => Posto::query()->find($id),
            'rotaBase' => $this->rotaBase,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PostoRequest $request, $id, UpdatePostoAction $action)
    {
        $this->authorize($this->rotaBase . '.editar');

        $data = PostoData::fromRequest($request);

        if ($action($data,$id)) {
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
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->authorize($this->rotaBase . '.delete');

        if (!$id)
            return redirect()->back()->with('error', 'Erro ao tentar excluir.');

        if (DestroyPostoAction::run($id)) {
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
            'items' => ListPostoAction::run(lixeira:true),
        ]);
    }

    public function restore($id)
    {
        $this->authorize($this->rotaBase . '.restaurar');

        if (!$id)
            return redirect()->back()->with('error', 'Erro ao tentar restaurar.');

        if (RestorePostoAction::run($id)) {
            return redirect()->back()->with('success', 'Restaurado com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Erro ao tentar restaurar.');
        }
    }
}
