<?php

namespace Crud\Domain\Motorista\DTO;

use Crud\App\Core\Classes\Mascara;
use Crud\App\Web\Motorista\Requests\MotoristaRequest;
use Spatie\DataTransferObject\DataTransferObject;

class MotoristaData extends DataTransferObject
{

    /** @var int */
    public $user_id;

    /** @var string */
    public $nome;

    /** @var string|null */
    public $cpf;

    /** @var string */
    public $cnpj;

    /** @var string|null */
    public $matricula;

    /** @var int|null */
    public $cnh;

    /** @var string|null */
    public $telefone;

    /** @var string|null */
    public $tipo_contratacao;

    /** @var string|null */
    public $celular_1;

    /** @var string|null */
    public $celular_2;

    /** @var bool|null */
    public $ativo;

    /** @var string */
    public $email;

    /** @var string */
    public $nascimento;

    public static function fromRequest(MotoristaRequest $request): MotoristaData
    {
        return new self([
            "user_id" => $request['user_id'],
            "nome" => $request['nome'],
            "cpf" => $request['cpf'],
            "cnpj" => $request['cnpj'],
            "matricula" => $request['matricula'],
            "cnh" => $request['cnh'],
            "telefone" => $request['telefone'],
            "tipo_contratacao" => $request['tipo_contratacao'],
            "celular_1" => $request['celular_1'],
            "celular_2" => $request['celular_2'],
            "ativo" => $request['ativo'],
            "email" => $request['email'],
            "nascimento" => Mascara::dataBd(valor:$request['nascimento']),
        ]);
    }

}
