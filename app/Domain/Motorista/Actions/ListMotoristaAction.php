<?php

namespace Crud\Domain\Motorista\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\Motorista\Models\Motorista;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ListMotoristaAction extends Actionable
{


    /**
     * @param int $qtdPagina
     * @param bool|null $selectOptions
     * @param bool $lixeira
     * @param bool $api
     * @return array|LengthAwarePaginator|Collection
     */
    public function handle(
        int       $qtdPagina = 15,
        bool|null $selectOptions = false,
        bool      $lixeira = false,
        bool      $api = false,
    )
    {
        if ($api === true)
            return Motorista::all();

        if ($selectOptions === false) {

            if ($lixeira === true)
                return Motorista::onlyTrashed()->paginate($qtdPagina);

            return Motorista::query()->paginate($qtdPagina);

        } else {
            foreach (Motorista::all() as $item) {
                $items[$item->id] = $item->nome;
            }

            return $items;
        }
    }
}
