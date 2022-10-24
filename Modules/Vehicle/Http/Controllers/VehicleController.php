<?php

namespace Modules\Vehicle\Http\Controllers;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\ControllerAbstract;

use Modules\Vehicle\Services\VehicleService;

class VehicleController extends ControllerAbstract
{
    protected function getService(): ServiceAbstract
    {
        return app(VehicleService::class);
    }
}
