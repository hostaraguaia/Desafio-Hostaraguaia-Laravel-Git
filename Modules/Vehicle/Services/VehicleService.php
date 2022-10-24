<?php

namespace Modules\Vehicle\Services;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Utils\Abstracts\FormRequestAbstract;

use Modules\Vehicle\Http\Requests\VehicleRequest;
use Modules\Vehicle\Repositories\VehicleRepository;


class VehicleService extends ServiceAbstract
{
    public function getRepository(): RepositoryAbstract
    {
        return app(VehicleRepository::class);
    }

    public function getRequest(): FormRequestAbstract
    {
        return app(VehicleRequest::class);
    }
}
