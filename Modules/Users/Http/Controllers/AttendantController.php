<?php

namespace Modules\Users\Http\Controllers;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\ControllerAbstract;

use Modules\Users\Services\AttendantService;

class AttendantController extends ControllerAbstract
{
    protected function getService(): ServiceAbstract
    {
        return app(AttendantService::class);
    }
}
