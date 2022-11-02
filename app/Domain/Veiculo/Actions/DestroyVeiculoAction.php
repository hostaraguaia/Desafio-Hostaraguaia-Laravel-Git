<?php

namespace Crud\Domain\Veiculo\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\Veiculo\Models\Veiculo;

class DestroyVeiculoAction extends Actionable
{

    public function handle(int $id = null)
    {
        return Veiculo::query()->find($id)->delete();
    }
}
