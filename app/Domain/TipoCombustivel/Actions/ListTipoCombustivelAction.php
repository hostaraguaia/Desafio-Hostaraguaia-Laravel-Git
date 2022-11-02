<?php

namespace Crud\Domain\TipoCombustivel\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\TipoCombustivel\Models\TipoCombustivel;

class ListTipoCombustivelAction extends Actionable
{

    /**
         * @param bool|null $selectOptions
         * @param int|null $qtdPagina
         * @return array|LengthAwarePaginator
         */
        public function handle(
            int $qtdPagina = 15,
            bool|null $selectOptions = false,
            bool $lixeira = false,
            bool $api = false,
        )
        {
            if($api === true)
                return TipoCombustivel::all();

            if ($selectOptions === false) {

                if($lixeira === true)
                    return TipoCombustivel::onlyTrashed()->paginate($qtdPagina);

                return TipoCombustivel::query()->paginate($qtdPagina);

            } else {
                foreach (TipoCombustivel::all() as $item) {
                    $items[$item->id] = $item->nome;
                }

                return $items;
            }
        }
}
