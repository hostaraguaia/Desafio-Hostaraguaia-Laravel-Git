<?php

namespace Crud\Domain\Posto\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\Posto\Models\Posto;

class RestorePostoAction extends Actionable
{

    public function handle(int $id = null)
    {
        if($id){
            return Posto::query()->where('id',$id)->withTrashed()->restore();
        }
    }
}
