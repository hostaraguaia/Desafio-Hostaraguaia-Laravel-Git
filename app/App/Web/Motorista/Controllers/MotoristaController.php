<?php

namespace Crud\App\Web\Motorista\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Crud\App\Core\Classes\Mascara;
use Crud\App\Core\Classes\RegistraUsuario;
use Crud\App\Core\Http\Controllers\Controller;
use Crud\App\Web\Motorista\Requests\MotoristaRequest;
use Crud\Domain\Motorista\Actions\DestroyMotoristaAction;
use Crud\Domain\Motorista\Actions\ListMotoristaAction;
use Crud\Domain\Motorista\Actions\OpcoesAtivoAction;
use Crud\Domain\Motorista\Actions\RestoreMotoristaAction;
use Crud\Domain\Motorista\Actions\StoreMotoristaAction;
use Crud\Domain\Motorista\Actions\UpdateMotoristaAction;
use Crud\Domain\Motorista\DTO\MotoristaData;
use Crud\Domain\Motorista\Models\Motorista;


class MotoristaController extends Controller
{

    private string $rotaBase = 'motoristas';


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
            'items' => ListMotoristaAction::run(),
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
            'opcoesAtivo' => OpcoesAtivoAction::run(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MotoristaRequest $request, StoreMotoristaAction $action)
    {
        $this->authorize($this->rotaBase . '.novo');

        $registraUsuario = RegistraUsuario::registra($request, 5);
        if ($registraUsuario->success === false) {
            return redirect()->back()->with('error', 'Erro ao tentar cadastrar.<br>' . $registraUsuario->message)->withInput();
        }


        if ($registraUsuario->success === true) {
            $request->merge(['user_id' => $registraUsuario->id]);

            $data = MotoristaData::fromRequest($request);

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
            'item' => Motorista::query()->find($id)
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
            'item' => Motorista::query()->find($id),
            'rotaBase' => $this->rotaBase,
            'opcoesAtivo' => OpcoesAtivoAction::run(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MotoristaRequest $request, $id, UpdateMotoristaAction $action)
    {
        $this->authorize($this->rotaBase . '.editar');

        $data = MotoristaData::fromRequest($request);

        if($action($data,$id)){
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
            if (DestroyMotoristaAction::run($id)) {
                return redirect()->back()->with('success', 'Excluído com sucesso.');
            } else {
                return redirect()->back()->with('error', 'Erro ao tentar excluir.');
            }
        }
    }




    public function trashed()
    {
        $this->authorize($this->rotaBase . '.lixeira');

        $this->authorize($this->rotaBase);

        return view($this->rotaBase . '.index', [
            'rotaBase' => $this->rotaBase,
            'items' => ListMotoristaAction::run(lixeira:true),
        ]);
    }

    public function restore($id)
    {
        $this->authorize($this->rotaBase . '.restaurar');

        if (!$id)
            return redirect()->back()->with('error', 'Erro ao tentar restaurar.');

        if (RestoreMotoristaAction::run($id)) {
            return redirect()->back()->with('success', 'Restaurado com sucesso.');
        } else {
            return redirect()->back()->with('error', 'Erro ao tentar restaurar.');
        }

    }




    public function relatorio()
    {
        $pdf = Pdf::loadView('motoristas.relatorio', [
            'items' => Motorista::all()
        ]);
        return $pdf->download('relatorio - ' . time() . '.pdf');
    }
}
