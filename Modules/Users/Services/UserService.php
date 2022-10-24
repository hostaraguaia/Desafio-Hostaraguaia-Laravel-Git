<?php

namespace Modules\Users\Services;

use Modules\Utils\ApiReturn\ApiReturn;
use Modules\Utils\Abstracts\ServiceAbstract;
use Modules\Utils\Abstracts\RepositoryAbstract;
use Modules\Utils\Abstracts\FormRequestAbstract;

use Modules\Users\Http\Requests\UserRequest;
use Modules\Users\Repositories\UserRepository;

use Illuminate\Support\Facades\Hash;

class UserService extends ServiceAbstract
{
    public function getRepository(): RepositoryAbstract
    {
        return app(UserRepository::class);
    }

    public function getRequest(): FormRequestAbstract
    {
        return app(UserRequest::class);
    }

    public function create($request)
    {
        if (isset($request['password']))
            $request['password'] = Hash::make($request['password']);

        return $this->getRepository()->create($request);
    }

    public function update($request, $id)
    {
        if (isset($request['password']))
            $request['password'] = Hash::make($request['newPassword']);

        $model = $this->find($id);
        return $this->getRepository()->edit($request->all(), $model);
    }

    public function information($id)
    {
        $user = $this->find($id);
        $user->avatar = $user->avatar;
        return ApiReturn::SuccessMessage('Informações', 200, $user);
    }

    public function permission($id)
    {
        $user = $this->find($id);
        return ApiReturn::SuccessMessage('Permissões', 200, $user->permissions);
    }
}
