<?php

namespace Crud\Domain\Frentista\Actions;

use Crud\Domain\Frentista\DTO\FrentistaData;
use Crud\Domain\Frentista\Models\Frentista;

final class UpdateFrentistaAction
{

    public function __invoke(FrentistaData $data, int $id): bool
    {
        return Frentista::query()->find($id)->update($data->toArray());
    }
}
