<?php

namespace Crud\Domain\Motorista\Actions;

use Crud\Domain\Motorista\DTO\MotoristaData;
use Crud\Domain\Motorista\Models\Motorista;


final class StoreMotoristaAction
{
    public function __invoke(MotoristaData $data): Motorista
    {
        return Motorista::create($data->toArray());
    }
}
