<?php

namespace Modules\Permission\Services;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Utils\Abstracts\FormRequestAbstract;
use Modules\Permission\Http\Requests\PermissionRequest;
use Modules\Permission\Repositories\PermissionRepository;


class PermissionService extends ServiceAbstract
{
    public function getRepository(): RepositoryAbstract
    {
        return app(PermissionRepository::class);
    }

    public function getRequest(): FormRequestAbstract
    {
        return app(PermissionRequest::class);
    }
}
