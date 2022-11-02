<?php

namespace Crud\Domain\Posto\Actions;

use Crud\App\Core\Actions\Actionable;
use Crud\Domain\Posto\Models\Posto;

class DestroyPostoAction extends Actionable
{

    public function handle(int $id = null)
    {
        return Posto::query()->find($id)->delete();
    }
}
