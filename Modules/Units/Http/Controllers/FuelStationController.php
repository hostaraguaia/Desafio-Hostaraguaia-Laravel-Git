<?php

namespace Modules\Units\Http\Controllers;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Units\Services\FuelStationService;
use Modules\Utils\Abstracts\ControllerAbstract;

class FuelStationController extends ControllerAbstract
{
    protected function getService(): ServiceAbstract
    {
        return app(FuelStationService::class);
    }
}
