<?php

namespace Modules\Vehicle\Enums;

use Modules\Utils\Abstracts\EnumAbstract;

class VehicleTypeEnum extends EnumAbstract
{
    const BICICLETA                = 'Bicicleta';
    const CICLOMOTOR               = 'Ciclomotor';
    const MOTONETA                 = 'Motoneta';
    const MOTOCICLETA              = 'Motocicleta';
    const AUTOMOVEL                = 'Automóvel';
    const MICROONIBUS              = 'Microônibus';
    const ONIBUS                   = 'Ônibus';
    const BONDE                    = 'Bonde';
    const CHARRETE                 = 'Charrete';
    const TRICICLO                 = 'Triciclo';
    const QUADRICICLO              = 'Quadriciclo';
    const CAMINHONETE              = 'Caminhonete';
    const CAMINHAO                 = 'Caminhão';
    const REBOQUE_OU_SEMI_REBOQUE  = 'Reboque ou Semi-Reboque';
    const CARROCA                  = 'Carroça';
    const CARRO_DE_MÃO             = 'Carro-de-Mão';
    const CARRO                    = 'Carro';
    const CAMIONETA                = 'Camioneta';
    const UTILITARIO               = 'Utilitário';
    const CAMINHAO_TRATOR          = 'Caminhão-Trator';
    const TRATOR_DE_RODAS          = 'Trator de Rodas';
    const TRATOR_DE_ESTEIRAS       = 'Trator de Esteiras';
    const TRATOR_MISTO             = 'Trator Misto';
    const ESPECIAL                 = 'Especial';
    const COLECAO                  = 'Coleção';

    public static function lists()
    {
        return [
            self::BICICLETA                => 'Bicicleta',
            self::CICLOMOTOR               => 'Ciclomotor',
            self::MOTONETA                 => 'Motoneta',
            self::MOTOCICLETA              => 'Motocicleta',
            self::AUTOMOVEL                => 'Automóvel',
            self::MICROONIBUS              => 'Microônibus',
            self::ONIBUS                   => 'Ônibus',
            self::BONDE                    => 'Bonde',
            self::CHARRETE                 => 'Charrete',
            self::TRICICLO                 => 'Triciclo',
            self::QUADRICICLO              => 'Quadriciclo',
            self::CAMINHONETE              => 'Caminhonete',
            self::CAMINHAO                 => 'Caminhão',
            self::REBOQUE_OU_SEMI_REBOQUE  => 'Reboque ou Semi-Reboque',
            self::CARROCA                  => 'Carroça',
            self::CARRO_DE_MÃO             => 'Carro-de-Mão',
            self::CARRO                    => 'Carro',
            self::CAMIONETA                => 'Camioneta',
            self::UTILITARIO               => 'Utilitário',
            self::CAMINHAO_TRATOR          => 'Caminhão-Trator',
            self::TRATOR_DE_RODAS          => 'Trator de Rodas',
            self::TRATOR_DE_ESTEIRAS       => 'Trator de Esteiras',
            self::TRATOR_MISTO             => 'Trator Misto',
            self::ESPECIAL                 => 'Especial',
            self::COLECAO                  => 'Coleção',
        ];
    }
}
