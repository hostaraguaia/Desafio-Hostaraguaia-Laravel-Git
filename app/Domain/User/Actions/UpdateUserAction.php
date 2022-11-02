<?php

namespace Crud\Domain\User\Actions;

use Crud\Domain\User\DTO\UserData;
use Crud\Domain\User\Models\User;


final class UpdateUserAction
{
    public function __invoke(UserData $data, int $id): bool
{
    return User::query()->find($id)->update($data->toArray());
    }
}
