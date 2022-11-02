<?php

namespace Crud\Domain\Frentista\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\Frentista\Models\Frentista;

class DestroyFrentistaAction extends Actionable
{

    public function handle(int $id = null)
    {
        return Frentista::query()->find($id)->delete();
    }
}
