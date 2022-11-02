<?php

namespace Crud\Domain\User\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\User\Models\User;

class DestroyUserAction extends Actionable
{

    public function handle(int $id = null)
    {
        return User::query()->find($id)->delete();
    }
}
