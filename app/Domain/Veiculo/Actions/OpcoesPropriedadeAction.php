<?php

namespace Crud\Domain\Veiculo\Actions;

use Crud\App\Core\Actions\Actionable;

class OpcoesPropriedadeAction extends Actionable
{

    public function handle(): array
    {
        return [
            'Própria' => 'Própria',
            'Terceirizado' => 'Terceirizado',
        ];
    }
}
