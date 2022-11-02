<?php

namespace Crud\Domain\TipoCombustivel\DTO;

use Crud\App\Core\Classes\Mascara;
use Crud\App\Web\TipoCombustivel\Requests\TipoCombustivelRequest;
use Spatie\DataTransferObject\DataTransferObject;

class TipoCombustivelData extends DataTransferObject
{

    /** @var string */
    public $nome;

    /** @var float */
    public $valor;

    /** @var string|null */
    public $observacoes;

    public static function fromRequest(TipoCombustivelRequest $request): TipoCombustivelData
    {
        return new self([
            'nome' => $request['nome'],
            'valor' => Mascara::moedaBd($request['valor']),
            'observacoes' => $request['observacoes'],
        ]);
    }

}
