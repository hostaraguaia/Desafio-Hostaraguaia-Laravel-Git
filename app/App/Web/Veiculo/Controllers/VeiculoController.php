<?php

namespace Crud\App\Web\Veiculo\Controllers;

use Crud\App\Core\Classes\Mascara;
use Crud\App\Core\Http\Controllers\Controller;
use Crud\App\Web\Veiculo\Requests\VeiculoRequest;
use Crud\Domain\Motorista\Actions\ListMotoristaAction;
use Crud\Domain\Motorista\Models\Motorista;
use Crud\Domain\TipoCombustivel\Actions\ListTipoCombustivelAction;
use Crud\Domain\TipoCombustivel\Models\TipoCombustivel;
use Crud\Domain\Veiculo\Actions\DestroyVeiculoAction;
use Crud\Domain\Veiculo\Actions\ListVeiculo;
use Crud\Domain\Veiculo\Actions\ListVeiculoAction;
use Crud\Domain\Veiculo\Actions\OpcoesPropriedadeAction;
use Crud\Domain\Veiculo\Actions\OpcoesTipoVeiculoAction;
use Crud\Domain\Veiculo\Actions\RestoreVeiculoAction;
use Crud\Domain\Veiculo\Actions\StoreVeiculoAction;
use Crud\Domain\Veiculo\Actions\UpdateVeiculoAction;
use Crud\Domain\Veiculo\DTO\VeiculoData;
use Crud\Domain\Veiculo\Models\Veiculo;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class VeiculoController extends Controller
{

    private string $rotaBase = 'veiculos';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->authorize($this->rotaBase);

        return view('veiculos.index', [
            'items' => ListVeiculoAction::run(),
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

        return view('veiculos.form', [
            'action' => 'Novo',
            'item' => null,
            'opcoesTipoVeiculo' => OpcoesTipoVeiculoAction::run(),
            'opcoesPropriedade' => OpcoesPropriedadeAction::run(),
            'opcoesMotorista' => ListMotoristaAction::run(selectOptions:true),
            'opcoesTipoCombustivel' => ListTipoCombustivelAction::run(selectOptions:true),
            'rotaBase' => $this->rotaBase
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(VeiculoRequest $request, StoreVeiculoAction $action)
    {
        $this->authorize($this->rotaBase . '.novo');

        $data = VeiculoData::fromRequest($request);
        if ($action($data)) {
            return redirect()->route('veiculos')
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
            'item' => Veiculo::query()->find($id)
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

        return view('veiculos.form', [
            'action' => 'edit',
            'item' => Veiculo::query()->find($id),
            'opcoesTipoVeiculo' => OpcoesTipoVeiculoAction::run(),
            'opcoesPropriedade' => OpcoesPropriedadeAction::run(),
            'opcoesMotorista' => ListMotoristaAction::run(selectOptions:true),
            'opcoesTipoCombustivel' => ListTipoCombustivelAction::run(selectOptions:true),
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
    public function update(VeiculoRequest $request, $id, UpdateVeiculoAction $action)
    {
        $this->authorize($this->rotaBase . '.editar');

        $data = VeiculoData::fromRequest($request);

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
            return redirect()->back()->with('error', 'Erro ao tentar excluir.');
        } else {
            if (DestroyVeiculoAction::run($id)) {
                return redirect()->back()->with('success', 'Excluído com sucesso.');
            } else {
                return redirect()->back()->with('error', 'Erro ao tentar excluir.');
            }
        }
    }


    /**
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function trashed()
    {
        $this->authorize($this->rotaBase . '.lixeira');

        return view($this->rotaBase . '.index', [
            'rotaBase' => $this->rotaBase,
            'items' => ListVeiculoAction::run(lixeira:true)
        ]);
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function restore($id)
    {
        $this->authorize($this->rotaBase . '.restaurar');

        if (!$id)
            return redirect()->back()->with('error', 'Erro ao tentar restaurar.');

        if (RestoreVeiculoAction::run($id)) {
            return redirect()->back()->with('success', 'Restaurado com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Erro ao tentar restaurar.');
        }
    }
}
