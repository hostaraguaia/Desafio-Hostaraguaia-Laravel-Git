<?php

namespace Crud\Domain\Veiculo\Actions;

use Crud\App\Core\Actions\Actionable;

class OpcoesTipoVeiculoAction extends Actionable
{

    public function handle() : array
    {
        return [
            'Ônibus' => 'Ônibus',
            'Carro' => 'Carro',
            'Moto' => 'Moto',
        ];
    }
}
