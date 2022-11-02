<?php

namespace Crud\Domain\Motorista\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\Motorista\Models\Motorista;

class RestoreMotoristaAction extends Actionable
{

    public function handle(int $id = null)
    {
        if($id){
            return Motorista::query()->where('id',$id)->withTrashed()->restore();
        }
    }
}
