<?php

namespace Crud\App\Web\TipoCombustivel\Controllers;

use Crud\App\Core\Classes\Mascara;
use Crud\App\Core\Http\Controllers\Controller;
use Crud\App\Web\TipoCombustivel\Requests\TipoCombustivelRequest;
use Crud\Domain\TipoCombustivel\Actions\DestroyTipoCombustivelAction;
use Crud\Domain\TipoCombustivel\Actions\ListTipoCombustivelAction;
use Crud\Domain\TipoCombustivel\Actions\RestoreTipoCombustivelAction;
use Crud\Domain\TipoCombustivel\Actions\StoreTipoCombustivelAction;
use Crud\Domain\TipoCombustivel\Actions\UpdateTipoCombustivelAction;
use Crud\Domain\TipoCombustivel\DTO\TipoCombustivelData;
use Crud\Domain\TipoCombustivel\Models\TipoCombustivel;
use Crud\Models\Combustivel;
use Illuminate\Console\View\Components\Task;

class TipoCombustivelController extends Controller
{

    private string $rotaBase = 'combustiveis';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->authorize($this->rotaBase);

        return view('combustiveis.index', [
            'items' => ListTipoCombustivelAction::run(),
            'rotaBase' => $this->rotaBase
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
            'rotaBase' => $this->rotaBase
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TipoCombustivelRequest $request, StoreTipoCombustivelAction $action)
    {
        $this->authorize($this->rotaBase . '.novo');

        $data = TipoCombustivelData::fromRequest($request);

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
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $this->authorize($this->rotaBase . '.ver');

        return view($this->rotaBase . '.show', [
            'rotaBase' => $this->rotaBase,
            'item' => TipoCombustivel::query()->find($id)
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

        return view('combustiveis.form', [
            'action' => 'Editar',
            'item' => TipoCombustivel::query()->find($id),
            'rotaBase' => $this->rotaBase
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TipoCombustivelRequest $request, $id, UpdateTipoCombustivelAction $action)
    {
        $this->authorize($this->rotaBase . '.editar');

        $data = TipoCombustivelData::fromRequest($request);

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

        if (!$id) {
            return redirect()->back()
                ->with('error', 'Erro ao tentar excluir.');
        } else {
            if (DestroyTipoCombustivelAction::run($id)) {
                return redirect()->back()
                    ->with('success', 'Excluído com sucesso.');
            } else {
                return redirect()->back()
                    ->with('error', 'Erro ao tentar excluir.');
            }
        }
    }



    public function trashed()
    {
        $this->authorize($this->rotaBase . '.lixeira');

        $this->authorize($this->rotaBase);

        return view($this->rotaBase . '.index', [
            'rotaBase' => $this->rotaBase,
            'items' => ListTipoCombustivelAction::run(lixeira:true)
        ]);
    }

    public function restore($id)
    {
        $this->authorize($this->rotaBase . '.restaurar');

        if (!$id)
            return redirect()->back()->with('error', 'Erro ao tentar restaurar.');

        if (RestoreTipoCombustivelAction::run($id)) {
            return redirect()->back()->with('success', 'Restaurado com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Erro ao tentar restaurar.');
        }
    }
}
