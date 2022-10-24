<?php

namespace Modules\Vehicle\Enums;

use Modules\Utils\Abstracts\EnumAbstract;

class VehicleCategoryEnum extends EnumAbstract
{
    const DIPLOMATICO  = 'Veículo de Representação Diplomática';
    const PARTICULAR   = 'Veículo Particular';
    const ALUGUEL      = 'Veículo de Aluguel';
    const APRENDIZAGEM = 'Veículo para Aprendizagem';

    public static function lists()
    {
        return [
            self::DIPLOMATICO  => 'Veículo de Representação Diplomática',
            self::PARTICULAR   => 'Veículo Particular',
            self::ALUGUEL      => 'Veículo de Aluguel',
            self::APRENDIZAGEM => 'Veículo para Aprendizagem'
        ];
    }
}
