<?php

namespace Modules\Vehicle\Services;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Utils\Abstracts\FormRequestAbstract;

use Modules\Vehicle\Http\Requests\InsurerRequest;
use Modules\Vehicle\Repositories\InsurerRepository;


class InsurerService extends ServiceAbstract
{
    public function getRepository(): RepositoryAbstract
    {
        return app(InsurerRepository::class);
    }

    public function getRequest(): FormRequestAbstract
    {
        return app(InsurerRequest::class);
    }
}
