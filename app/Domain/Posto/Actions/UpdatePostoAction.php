<?php

namespace Crud\Domain\Posto\Actions;

use Crud\Domain\Posto\DTO\PostoData;
use Crud\Domain\Posto\Models\Posto;


final class UpdatePostoAction
{
    public function __invoke(PostoData $data, int $id): bool
{
    return Posto::query()->find($id)->update($data->toArray());
    }
}
