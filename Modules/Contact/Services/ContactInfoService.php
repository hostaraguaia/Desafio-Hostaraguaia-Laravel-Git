<?php

namespace Modules\Contact\Services;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Utils\Abstracts\FormRequestAbstract;

use Modules\Contact\Http\Requests\ContactInfoRequest;
use Modules\Contact\Repositories\ContactInfoRepository;


class ContactInfoService extends ServiceAbstract
{
    public function getRepository(): RepositoryAbstract
    {
        return app(ContactInfoRepository::class);
    }

    public function getRequest(): FormRequestAbstract
    {
        return app(ContactInfoRequest::class);
    }
}
