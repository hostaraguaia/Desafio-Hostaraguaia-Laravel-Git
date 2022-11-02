<?php

namespace Crud\Domain\Frentista\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\Frentista\Models\Frentista;

class RestoreFrentistaAction extends Actionable
{

    public function handle(int $id = null)
    {
        if($id){
            return Frentista::query()->where('id',$id)->withTrashed()->restore();
        }
    }
}
