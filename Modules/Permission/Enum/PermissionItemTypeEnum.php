<?php

namespace Modules\Permission\Enum;

use Modules\Utils\Abstracts\EnumAbstract;

abstract class PermissionItemTypeEnum extends EnumAbstract
{
    const ROUTE = 'rotue';
    const ITEM  = 'item';

    public static function lists() {
        return [
            self::ROUTE => 'Route',
            self::ITEM  => 'Item',
        ];
    }
}