<?php

namespace Crud\Domain\User\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\User\Models\User;

class RestoreUserAction extends Actionable
{

    public function handle(int $id = null)
    {
        if($id){
            return User::query()->where('id',$id)->withTrashed()->restore();
        }
    }
}
