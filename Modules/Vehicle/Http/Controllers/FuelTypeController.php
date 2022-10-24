<?php

namespace Modules\Vehicle\Http\Controllers;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\ControllerAbstract;

use Modules\Vehicle\Services\FuelTypeService;

class FuelTypeController extends ControllerAbstract
{
    protected function getService(): ServiceAbstract
    {
        return app(FuelTypeService::class);
    }
}
