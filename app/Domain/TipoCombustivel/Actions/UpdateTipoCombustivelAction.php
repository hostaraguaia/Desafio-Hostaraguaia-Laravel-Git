<?php

namespace Crud\Domain\TipoCombustivel\Actions;

use Crud\Domain\TipoCombustivel\DTO\TipoCombustivelData;
use Crud\Domain\TipoCombustivel\Models\TipoCombustivel;


final class UpdateTipoCombustivelAction
{
    public function __invoke(TipoCombustivelData $data, int $id): bool
{
    return TipoCombustivel::query()->find($id)->update($data->toArray());
    }
}
