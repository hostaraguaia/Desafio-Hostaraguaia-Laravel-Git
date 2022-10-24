<?php

namespace Modules\Users\Services;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Utils\Abstracts\FormRequestAbstract;

use Modules\Users\Http\Requests\AttendantRequest;
use Modules\Users\Repositories\AttendantRepository;


class AttendantService extends ServiceAbstract
{
    public function getRepository(): RepositoryAbstract
    {
        return app(AttendantRepository::class);
    }

    public function getRequest(): FormRequestAbstract
    {
        return app(AttendantRequest::class);
    }
}
