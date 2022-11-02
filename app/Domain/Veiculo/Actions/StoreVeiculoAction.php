<?php

namespace Crud\Domain\Veiculo\Actions;

use Crud\Domain\Veiculo\DTO\VeiculoData;
use Crud\Domain\Veiculo\Models\Veiculo;

final class StoreVeiculoAction
{

    public function __invoke(VeiculoData $data): Veiculo
    {
        return Veiculo::create($data->toArray());
    }
}
