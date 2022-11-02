<?php

namespace Crud\Domain\Posto\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\Posto\Models\Posto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListPostoAction extends Actionable
{

    /**
     * @param int $qtdPagina
     * @param bool $selectOptions
     * @param bool $lixeira
     * @return array|LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection
     */
    public function handle(
        int $qtdPagina = 15,
        bool|null $selectOptions = false,
        bool $lixeira = false,
        bool $api = false,
    )
    {
        if($api === true)
            return Posto::all();

        if ($selectOptions === false) {

            if($lixeira === true)
                return Posto::onlyTrashed()->paginate($qtdPagina);

            return Posto::query()->paginate($qtdPagina);

        } else {
            foreach (Posto::all() as $item) {
                $items[$item->id] = $item->nome_fantasia;
            }

            return $items;
        }
    }
}
