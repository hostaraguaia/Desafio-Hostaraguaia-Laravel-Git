<?php

namespace Crud\Domain\Veiculo\DTO;

use Crud\App\Core\Classes\Mascara;
use Crud\App\Web\Veiculo\Requests\VeiculoRequest;
use Spatie\DataTransferObject\DataTransferObject;

class VeiculoData extends DataTransferObject
{

    /** @var int */
    public $motorista_id;

    /** @var int */
    public $tipo_combustivel_id;

    /** @var string */
    public $tipo_veiculo;

    /** @var string */
    public $propriedade;

    /** @var string */
    public $placa;

    /** @var string|null */
    public $marca;

    /** @var string|null */
    public $modelo;

    /** @var int */
    public $ano_fabricacao;

    /** @var int|null */
    public $chassi;

    /** @var int|null */
    public $renavam;

    /** @var string|null */
    public $cor;

    /** @var int|null */
    public $consumo_medio;

    /** @var string|null */
    public $observacoes;

    /** @var int|null */
    public $tanque_capacidade;

    /** @var int|null */
    public $limite_troca_oleo;

    /** @var string|null */
    public $seguradora;

    /** @var float|null */
    public $valor_limite_mes;

    /** @var string|null */
    public $data_proximo_licenciamento;

    public static function fromRequest(VeiculoRequest $request): VeiculoData
    {
        return new self([
            "motorista_id" => $request['motorista_id'],
            "tipo_combustivel_id" => $request['tipo_combustivel_id'],
            "tipo_veiculo" => $request['tipo_veiculo'],
            "propriedade" => $request['propriedade'],
            "placa" => $request['placa'],
            "marca" => $request['marca'],
            "modelo" => $request['modelo'],
            "ano_fabricacao" => $request['ano_fabricacao'],
            "chassi" => $request['chassi'],
            "renavam" => $request['renavam'],
            "cor" => $request['cor'],
            "consumo_medio" => $request['consumo_medio'],
            "observacoes" => $request['observacoes'],
            "tanque_capacidade" => $request['tanque_capacidade'],
            "limite_troca_oleo" => $request['limite_troca_oleo'],
            "seguradora" => $request['seguradora'],
            "valor_limite_mes" => Mascara::moedaBd($request['valor_limite_mes']),
            "data_proximo_licenciamento" => Mascara::dataBd($request['data_proximo_licenciamento']),
        ]);
    }

}
