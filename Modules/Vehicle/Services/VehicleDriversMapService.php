<?php

namespace Modules\Vehicle\Services;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Utils\Abstracts\FormRequestAbstract;

use Modules\Vehicle\Http\Requests\VehicleDriversMapRequest;
use Modules\Vehicle\Repositories\VehicleDriversMapRepository;


class VehicleDriversMapService extends ServiceAbstract
{
    public function getRepository(): RepositoryAbstract
    {
        return app(VehicleDriversMapRepository::class);
    }

    public function getRequest(): FormRequestAbstract
    {
        return app(VehicleDriversMapRequest::class);
    }
}
