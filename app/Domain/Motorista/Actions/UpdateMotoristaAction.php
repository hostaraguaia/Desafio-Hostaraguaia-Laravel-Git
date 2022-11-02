<?php

namespace Crud\Domain\Motorista\Actions;

use Crud\Domain\Motorista\DTO\MotoristaData;
use Crud\Domain\Motorista\Models\Motorista;


final class UpdateMotoristaAction
{
    public function __invoke(MotoristaData $data, int $id): bool
    {
        return Motorista::query()->find($id)->update($data->toArray());
    }
}
