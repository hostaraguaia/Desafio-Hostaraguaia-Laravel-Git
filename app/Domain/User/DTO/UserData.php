<?php

namespace Crud\Domain\User\DTO;

use Crud\App\Core\Classes\Mascara;
use Crud\App\Web\User\Requests\UserRequest;
use Crud\App\Web\Usuario\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{

    /** @var int */
    public $nivel_id;

    /** @var string */
    public $name;

    /** @var string */
    public $username;

    /** @var string */
    public $email;

    /** @var string|null */
    public $celular_1;

    /** @var string|null */
    public $celular_2;

    /** @var string */
    public $password;


    public static function fromRequest(UsuarioRequest $request): UserData
    {
        return new self([
            'nivel_id' => $request['nivel_id'],
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'celular_1' => $request['celular_1'],
            'celular_2' => $request['celular_2'],
            'password' => Hash::make($request['password']),
        ]);
    }

}
