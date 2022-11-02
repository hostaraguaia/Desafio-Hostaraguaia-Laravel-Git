<?php

namespace Crud\Domain\TipoCombustivel\Actions;

use Crud\Domain\TipoCombustivel\DTO\TipoCombustivelData;
use Crud\Domain\TipoCombustivel\Models\TipoCombustivel;


final class StoreTipoCombustivelAction
{
    public function __invoke(TipoCombustivelData $data): TipoCombustivel
{
    return TipoCombustivel::create($data->toArray());
    }
}
