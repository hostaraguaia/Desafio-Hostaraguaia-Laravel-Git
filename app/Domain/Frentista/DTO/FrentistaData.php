<?php

namespace Crud\Domain\Frentista\DTO;

use Crud\App\Web\Frentista\Requests\FrentistaRequest;
use Spatie\DataTransferObject\DataTransferObject;

class FrentistaData extends DataTransferObject
{

    /** @var int */
    public $user_id;

    /** @var int */
    public $posto_id;

    /** @var string */
    public $nome;

    /** @var string */
    public $email;

    /** @var string|null */
    public $telefone;

    public static function fromRequest(FrentistaRequest $request): FrentistaData
    {
        return new self([
            'user_id' => $request['user_id'],
            'posto_id' => $request['posto_id'],
            'nome' => $request['nome'],
            'email' => $request['email'],
            'telefone' => $request['telefone'],

        ]);
    }

}
