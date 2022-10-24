<?php

namespace Modules\Users\Http\Controllers;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\ControllerAbstract;

use Modules\Users\Services\DriverService;

class DriverController extends ControllerAbstract
{
    protected function getService(): ServiceAbstract
    {
        return app(DriverService::class);
    }
}
