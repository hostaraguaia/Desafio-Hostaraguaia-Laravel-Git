<?php

namespace Modules\Utils\Utilitaries;

class Routes
{
    public static function RequireArray(array $routes, string $path)
    {
        foreach ($routes as $route)
            require_once("$path/$route");
    }

    public static function RequirePath($path)
    {
        $routes = array_diff(scandir($path), array('..', '.'));
        return self::RequireArray($routes, $path);
    }
}
