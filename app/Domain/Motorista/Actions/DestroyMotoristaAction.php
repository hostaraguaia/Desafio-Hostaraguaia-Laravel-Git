<?php

namespace Crud\Domain\Motorista\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\Motorista\Models\Motorista;

class DestroyMotoristaAction extends Actionable
{

    public function handle(int $id = null)
    {
        return Motorista::query()->find($id)->delete();
    }
}
