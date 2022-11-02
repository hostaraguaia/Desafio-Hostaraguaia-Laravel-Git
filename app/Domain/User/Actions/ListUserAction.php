<?php

namespace Crud\Domain\User\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\User\Models\User;

class ListUserAction extends Actionable
{

    /**
     * @param bool|null $selectOptions
     * @param int|null $qtdPagina
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection
     */
    public function handle(
        int       $qtdPagina = 15,
        bool|null $selectOptions = false,
        bool      $lixeira = false,
        bool      $api = false,
    )
    {
        if($api === true)
            return User::all();

        if ($selectOptions === false) {

            if ($lixeira === true)
                return User::onlyTrashed()->paginate($qtdPagina);

            return User::query()->paginate($qtdPagina);

        } else {
            foreach (User::all() as $item) {
                $items[$item->id] = $item->nome;
            }

            return $items;
        }
    }
}
