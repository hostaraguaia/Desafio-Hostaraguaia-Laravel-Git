<?php

namespace Modules\Units\Services;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Utils\Abstracts\FormRequestAbstract;

use Modules\Units\Http\Requests\FuelStationRequest;
use Modules\Units\Repositories\FuelStationRepository;


class FuelStationService extends ServiceAbstract
{
    public function getRepository(): RepositoryAbstract
    {
        return app(FuelStationRepository::class);
    }

    public function getRequest(): FormRequestAbstract
    {
        return app(FuelStationRequest::class);
    }
}
