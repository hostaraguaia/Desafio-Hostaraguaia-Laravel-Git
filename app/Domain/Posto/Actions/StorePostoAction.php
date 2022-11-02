<?php

namespace Crud\Domain\Posto\Actions;

use Crud\Domain\Posto\DTO\PostoData;
use Crud\Domain\Posto\Models\Posto;


final class StorePostoAction
{
    public function __invoke(PostoData $data): Posto
    {
        return Posto::create($data->toArray());
    }
}
