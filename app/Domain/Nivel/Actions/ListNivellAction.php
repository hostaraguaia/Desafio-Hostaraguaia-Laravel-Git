<?php

namespace Crud\Domain\Nivel\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\Nivel\Models\Nivel;

class ListNivellAction extends Actionable
{

    /**
         * @param bool|null $selectOptions
         * @param int|null $qtdPagina
         * @return array|LengthAwarePaginator
         */
        public function handle(
            int $qtdPagina = 15,
            bool|null $selectOptions = false,
        )
        {
            if ($selectOptions === false) {

                return Nivel::query()->paginate($qtdPagina);

            } else {
                foreach (Nivel::query()->whereNotIn('id',[3,4,5])->get() as $item) {
                    $items[$item->id] = $item->nome;
                }

                return $items;
            }
        }
}
