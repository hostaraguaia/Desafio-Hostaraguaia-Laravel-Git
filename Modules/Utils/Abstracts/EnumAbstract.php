<?php

namespace Modules\Utils\Abstracts;

abstract class EnumAbstract
{
    abstract public static function lists();

    public static function getValue($key)
    {
        $list = static::lists();

        if (!isset($list[$key])) :
            return '';
        endif;

        return $list[$key];
    }

    public static function keys()
    {
        return array_keys(static::lists());
    }
}
