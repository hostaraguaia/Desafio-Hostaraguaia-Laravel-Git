<?php

namespace Crud\Domain\TipoCombustivel\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\TipoCombustivel\Models\TipoCombustivel;

class RestoreTipoCombustivelAction extends Actionable
{

    public function handle(int $id = null)
    {
        if($id){
            return TipoCombustivel::query()->where('id',$id)->withTrashed()->restore();
        }
    }
}
