<?php

namespace Modules\Utils\Enums;

use Modules\Utils\Abstracts\EnumAbstract;

abstract class StatusEnum extends EnumAbstract
{
    const ACTIVE   = 'active';
    const INACTIVE = 'inactive';
    const BLOCKED  = 'blocked';

    public static function lists()
    {
        return [
            self::ACTIVE   => 'active',
            self::INACTIVE => 'inactive',
            self::BLOCKED  => 'blocked',
        ];
    }
}
