<?php

namespace Modules\Utils\Utilitaries;

class Arrays
{
    public static function Flatten(array $array)
    {
        $flatten = array();
        array_walk_recursive($array, function ($value) use (&$flatten) {
            $flatten[] = $value;
        });

        return $flatten;
    }

    public static function Separate(array $array)
    {
        $keys = array_keys($array);
        $values = array_values($array);

        return ['keys' => $keys, 'values' => $values];
    }
}
