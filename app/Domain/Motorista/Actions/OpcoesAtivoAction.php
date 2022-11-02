<?php

namespace Crud\Domain\Motorista\Actions;

use Crud\App\Core\Actions\Actionable;

class OpcoesAtivoAction extends Actionable
{


    /**
     * @return array
     */
    public function handle(): array
    {
        return [
            '0' => 'Não',
            '1' => 'Sim',
        ];
    }
}
