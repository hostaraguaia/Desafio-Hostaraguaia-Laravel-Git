<?php

namespace Modules\Vehicle\Http\Controllers;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\ControllerAbstract;

use Modules\Vehicle\Services\InsurerService;

class InsurerController extends ControllerAbstract
{
    protected function getService(): ServiceAbstract
    {
        return app(InsurerService::class);
    }
}
