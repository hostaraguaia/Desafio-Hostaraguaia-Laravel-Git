<?php

namespace Modules\Contact\Http\Controllers;

use Modules\Contact\Services\AddressService;
use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\ControllerAbstract;

class AddressController extends ControllerAbstract
{
    protected function getService(): ServiceAbstract
    {
        return app(AddressService::class);
    }
}
