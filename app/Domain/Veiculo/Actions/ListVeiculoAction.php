<?php

namespace Crud\Domain\Veiculo\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\Motorista\Models\Motorista;
use Crud\Domain\Veiculo\Models\Veiculo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListVeiculoAction extends Actionable
{

    /**
     * @param int $qtdPagina
     * @param bool $selectOptions
     * @param bool $lixeira
     * @return array|LengthAwarePaginator
     */
    public function handle(
        int $qtdPagina = 15,
        bool|null $selectOptions = false,
        bool $lixeira = false,
        bool $api = false,
    )
    {
        $nivelId = auth(($api === true) ? 'api' : null)->user()->nivel->id;

        if ($api === true) {
            return Veiculo::query()
                ->when($nivelId === 5, function ($query) {
                    $query->where(
                        'motorista_id',
                        Motorista::query()->where('user_id', auth('api')->user()->id)->first()->id);
                })
                ->get();
        }

        if ($selectOptions === false) {

            if($lixeira === true)
                return Veiculo::onlyTrashed()
                    ->when($nivelId === 5, function ($query) {
                        $query->where(
                            'motorista_id',
                            Motorista::query()->where('user_id', auth()->user()->id)->first()->id);
                    })
                    ->paginate($qtdPagina);

            return Veiculo::query()
                ->when($nivelId === 5, function ($query) {
                    $query->where(
                        'motorista_id',
                        Motorista::query()->where('user_id', auth()->user()->id)->first()->id);
                })
                ->paginate($qtdPagina);

        } else {
            foreach (Veiculo::all() as $item) {
                $items[$item->id] = $item->nome;
            }

            return $items;
        }
    }
}
