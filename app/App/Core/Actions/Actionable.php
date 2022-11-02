<?php

namespace Crud\App\Core\Actions;

abstract class Actionable
{
    public abstract function handle();


    /**
     * @see static::handle()
     */
    public static function run(...$arguments)
    {
        return app(static::class)->handle(...$arguments);
    }
}
