<?php

namespace Crud\Domain\Posto\DTO;

use Crud\App\Core\Classes\Mascara;
use Crud\App\Web\Posto\Requests\PostoRequest;
use Spatie\DataTransferObject\DataTransferObject;

class PostoData extends DataTransferObject
{

    /** @var int */
    public $user_id;

    /** @var string */
    public $nome_fantasia;

    /** @var string */
    public $razao_social;

    /** @var string */
    public $cnpj;

    /** @var string|null */
    public $logradouro;

    /** @var string|null */
    public $cep;

    /** @var string|null */
    public $complemento;

    /** @var string|null */
    public $bairro;

    /** @var string|null */
    public $cidade;

    /** @var string|null */
    public $uf;

    /** @var string|null */
    public $responsavel;

    /** @var string|null */
    public $telefone;

    /** @var string */
    public $email;

    public static function fromRequest(PostoRequest $request): PostoData
    {
        return new self([
            "user_id" => $request['user_id'],
            "nome_fantasia" => $request['nome_fantasia'],
            "razao_social" => $request['razao_social'],
            "cnpj" => $request['cnpj'],
            "logradouro" => $request['logradouro'],
            "cep" => $request['cep'],
            "complemento" => $request['complemento'],
            "bairro" => $request['bairro'],
            "cidade" => $request['cidade'],
            "uf" => $request['uf'],
            "responsavel" => $request['responsavel'],
            "telefone" => $request['telefone'],
            "email" => $request['email'],
        ]);
    }

}
