<?php

namespace Modules\Vehicle\Services;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Utils\Abstracts\FormRequestAbstract;

use Modules\Vehicle\Http\Requests\FuelTypeRequest;
use Modules\Vehicle\Repositories\FuelTypeRepository;


class FuelTypeService extends ServiceAbstract
{
    public function getRepository(): RepositoryAbstract
    {
        return app(FuelTypeRepository::class);
    }

    public function getRequest(): FormRequestAbstract
    {
        return app(FuelTypeRequest::class);
    }
}
