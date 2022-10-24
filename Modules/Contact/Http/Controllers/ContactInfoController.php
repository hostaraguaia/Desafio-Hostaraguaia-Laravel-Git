<?php

namespace Modules\Contact\Http\Controllers;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\ControllerAbstract;
use Modules\Contact\Services\ContactInfoService;

class ContactInfoController extends ControllerAbstract
{
    protected function getService(): ServiceAbstract
    {
        return app(ContactInfoService::class);
    }
}
