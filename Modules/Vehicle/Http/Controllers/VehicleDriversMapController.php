<?php

namespace Modules\Vehicle\Http\Controllers;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\ControllerAbstract;

use Modules\Vehicle\Services\VehicleDriversMapService;

class VehicleDriversMapController extends ControllerAbstract
{
    protected function getService(): ServiceAbstract
    {
        return app(VehicleDriversMapService::class);
    }
}
