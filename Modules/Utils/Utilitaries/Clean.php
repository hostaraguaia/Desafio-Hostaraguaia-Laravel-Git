<?php

namespace Modules\Utils\Utilitaries;

class Clean
{
    public static function Slashes($string)
    {
        return preg_replace('/\\\\/', '', $string);
    }

    public static function UndeScore($string)
    {
        return preg_replace('/_+/', '', $string);
    }

    public static function Spaces($string)
    {
        return preg_replace('/\s+/', '', $string);
    }

    public static function Dots($string)
    {
        return preg_replace('~(?:\G(?!^)|\[)[^][.]*\K\.~', '', $string);
    }

    public static function AccentMark($string)
    {
        return preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $string);
    }

    //Does All of the above
    public static function All($string)
    {
        return preg_replace('/\s+/', '', $string);
    }

    public static function Number($numero, $prefix = 'R$')
    {
        $numero = str_replace([$prefix, '%'], '', $numero);
        $numero = str_replace('.', '', $numero);
        return trim(str_replace(',', '.', $numero));
    }

    public static function HTML($html)
    {
        $html = strip_tags($html);
        $html = str_replace('&nbsp;', '', $html);

        return trim($html);
    }
}
