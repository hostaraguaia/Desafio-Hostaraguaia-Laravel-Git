<?php

namespace Crud\Domain\Frentista\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\Frentista\Models\Frentista;
use Crud\Domain\Posto\Models\Posto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HigherOrderWhenProxy;

class ListFrentistaAction extends Actionable
{


    /**
     * @param int $qtdPagina
     * @param bool|null $selectOptions
     * @param bool $lixeira
     * @param bool $api
     * @return array|LengthAwarePaginator|Builder|Collection|HigherOrderWhenProxy
     */
    public function handle(
        int       $qtdPagina = 15,
        bool|null $selectOptions = false,
        bool      $lixeira = false,
        bool      $api = false,
    )
    {

        $nivelId = auth(($api === true) ? 'api' : null)->user()->nivel->id;

        if ($api === true) {
            return Frentista::query()
                ->when($nivelId === 3, function ($query) {
                    $query->where(
                        'posto_id',
                        Posto::query()->where('user_id', auth('api')->user()->id)->first()->id);
                })
                ->get();
        }


        if ($selectOptions === false) {

            if ($lixeira === true)
                return Frentista::onlyTrashed()
                    ->when($nivelId === 3, function ($query) {
                        $query->where(
                            'posto_id',
                            Posto::query()->where('user_id', auth()->user()->id)->first()->id);
                    })
                    ->paginate($qtdPagina);

            return Frentista::query()
                ->when($nivelId === 3, function ($query) {
                    $query->where(
                        'posto_id',
                        Posto::query()->where('user_id', auth()->user()->id)->first()->id);
                })
                ->paginate($qtdPagina);

        } else {
            foreach (Frentista::all() as $item) {
                $items[$item->id] = $item->nome;
            }

            return $items;
        }
    }
}
