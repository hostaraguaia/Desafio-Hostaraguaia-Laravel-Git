<?php

namespace Crud\Domain\Frentista\Actions;

use Crud\Domain\Frentista\DTO\FrentistaData;
use Crud\Domain\Frentista\Models\Frentista;

final class StoreFrentistaAction
{

    public function __invoke(FrentistaData $data): Frentista
    {
        return Frentista::create($data->toArray());
    }
}
