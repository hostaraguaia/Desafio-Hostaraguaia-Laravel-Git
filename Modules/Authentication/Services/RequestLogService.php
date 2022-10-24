<?php

namespace Modules\Authentication\Services;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Utils\Abstracts\FormRequestAbstract;
use Modules\Authentication\Http\Requests\RequestLogRequest;
use Modules\Authentication\Repositories\RequestLogRepository;

class RequestLogService extends ServiceAbstract
{
    public function getRepository(): RepositoryAbstract
    {
        return app(RequestLogRepository::class);
    }

    public function getRequest(): FormRequestAbstract
    {
        return app(RequestLogRequest::class);
    }
}