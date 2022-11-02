<?php

namespace Crud\Domain\TipoCombustivel\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\TipoCombustivel\Models\TipoCombustivel;

class DestroyTipoCombustivelAction extends Actionable
{

    public function handle(int $id = null)
    {
        if($id){
            return TipoCombustivel::query()->find($id)->delete();
        }
    }
}
