<?php

namespace Crud\Domain\Veiculo\Actions;

use Crud\Domain\Veiculo\DTO\VeiculoData;
use Crud\Domain\Veiculo\Models\Veiculo;


final class UpdateVeiculoAction
{
    public function __invoke(VeiculoData $data, int $id): bool
{
    return Veiculo::query()->find($id)->update($data->toArray());
    }
}
