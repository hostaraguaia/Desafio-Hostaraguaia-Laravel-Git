<?php

namespace Crud\Domain\Veiculo\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\Veiculo\Models\Veiculo;

class RestoreVeiculoAction extends Actionable
{

    public function handle(int $id = null)
    {
        if($id){
            return Veiculo::query()->where('id',$id)->withTrashed()->restore();
        }
    }
}
