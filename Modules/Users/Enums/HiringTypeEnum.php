<?php

namespace Modules\Users\Enums;

use Modules\Utils\Abstracts\EnumAbstract;

abstract class HiringTypeEnum extends EnumAbstract
{
    const CLT           = 'Carteira assinada (CLT)';
    const PJ            = 'Trabalho com contrato PJ (freelancer)';
    const TEMPORARIA    = 'Contratação temporária';
    const PARCIAL       = 'Trabalho parcial';
    const ESTAGIO       = 'Estágio';
    const APRENDIZ      = 'Jovem Aprendiz';
    const TERCEIRIZACAO = 'Terceirização';
    const REMOTO        = 'Home office ou trabalho remoto';
    const INTERMITENTE  = 'Trabalho intermitente';
    const AUTONOMO      = 'Trabalho autônomo';


    public static function lists()
    {
        return [
            self::CLT           => 'Carteira assinada (CLT)',
            self::PJ            => 'Trabalho com contrato PJ (freelancer)',
            self::TEMPORARIA    => 'Contratação temporária',
            self::PARCIAL       => 'Trabalho parcial',
            self::ESTAGIO       => 'Estágio',
            self::APRENDIZ      => 'Jovem Aprendiz',
            self::TERCEIRIZACAO => 'Terceirização',
            self::REMOTO        => 'Home office ou trabalho remoto',
            self::INTERMITENTE  => 'Trabalho intermitente',
            self::AUTONOMO      => 'Trabalho autônomo',
        ];
    }
}
