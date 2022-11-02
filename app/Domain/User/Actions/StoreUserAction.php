<?php

namespace Crud\Domain\User\Actions;

use Crud\Domain\User\DTO\UserData;
use Crud\Domain\User\Models\User;


final class StoreUserAction
{
    public function __invoke(UserData $data): User
{
    return User::create($data->toArray());
    }
}
