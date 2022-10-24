<?php

namespace Modules\Vehicle\Enums;

use Modules\Utils\Abstracts\EnumAbstract;

class FuelTypeEnum extends EnumAbstract
{
    const GASOLINA_COMUM     = 'Gasolina Comum';
    const GASOLINA_ADITIVADA = 'Gasolina Aditivada';
    const GASOLINA_PREMIUM   = 'Gasolina Premium';
    const GASOLINA_FORMULADA = 'Gasolina Formulada';
    const ETANOL             = 'Etanol';
    const ETANOL_ADITIVADO   = 'Etanol Aditivado';
    const DIESEL             = 'Diesel';
    const DIESEL_S10         = 'Diesel S-10';
    const DIESEL_ADITIVADO   = 'Diesel Aditivado';
    const DIESEL_PREMIUM     = 'Diesel Premium';
    const FLEX               = 'Flex';
    const ELETRICO           = 'Eletrico';
    const GNV                = 'GNV (Gás Natural Veicular)';
    const OUTROS             = 'Outros';

    public static function lists()
    {
        return [
            self::GASOLINA_COMUM     => 'Gasolina Comum',
            self::GASOLINA_ADITIVADA => 'Gasolina Aditivada',
            self::GASOLINA_PREMIUM   => 'Gasolina Premium',
            self::GASOLINA_FORMULADA => 'Gasolina Formulada',
            self::ETANOL             => 'Etanol',
            self::ETANOL_ADITIVADO   => 'Etanol Aditivado',
            self::DIESEL             => 'Diesel',
            self::DIESEL_S10         => 'Diesel S-10',
            self::DIESEL_ADITIVADO   => 'Diesel Aditivado',
            self::DIESEL_PREMIUM     => 'Diesel Premium',
            self::FLEX               => 'Flex',
            self::ELETRICO           => 'Eletrico',
            self::GNV                => 'GNV (Gás Natural Veicular)',
            self::OUTROS             => 'Outros',
        ];
    }
}
