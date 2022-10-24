<?php

namespace Modules\Contact\Services;

use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Utils\Abstracts\FormRequestAbstract;

use Modules\Contact\Http\Requests\AddressRequest;
use Modules\Contact\Repositories\AddressRepository;

class AddressService extends ServiceAbstract
{
    public function getRepository(): RepositoryAbstract
    {
        return app(AddressRepository::class);
    }

    public function getRequest(): FormRequestAbstract
    {
        return app(AddressRequest::class);
    }
}
