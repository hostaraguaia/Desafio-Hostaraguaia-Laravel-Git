<?php

namespace Modules\Users\Services;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Utils\Abstracts\FormRequestAbstract;

use Modules\Users\Http\Requests\DriverRequest;
use Modules\Users\Repositories\DriverRepository;


class DriverService extends ServiceAbstract
{
    public function getRepository(): RepositoryAbstract
    {
        return app(DriverRepository::class);
    }

    public function getRequest(): FormRequestAbstract
    {
        return app(DriverRequest::class);
    }
}
