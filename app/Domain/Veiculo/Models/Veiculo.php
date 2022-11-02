<?php

namespace Crud\Domain\Veiculo\Models;

use Crud\App\Core\Classes\Mascara;
use Crud\Domain\Motorista\Models\Motorista;
use Crud\Domain\TipoCombustivel\Models\TipoCombustivel;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Veiculo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "motorista_id",
        "tipo_combustivel_id",
        "tipo_veiculo",
        "propriedade",
        "placa",
        "marca",
        "modelo",
        "ano_fabricacao",
        "chassi",
        "renavam",
        "cor",
        "consumo_medio",
        "observacoes",
        "tanque_capacidade",
        "limite_troca_oleo",
        "seguradora",
        "valor_limite_mes",
        "data_proximo_licenciamento",
    ];

    protected $dates = [
        'deleted_at'
    ];

    #region Relations
    public function motorista(): BelongsTo
    {
        return $this->belongsTo(Motorista::class);
    }

    public function tipoCombustivel(): BelongsTo
    {
        return $this->belongsTo(TipoCombustivel::class);
    }
    #endregion

    #region Mutators
    /**
     * @return Attribute
     */
    public function dataProximoLicenciamento(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Mascara::dataHora(valor: $this->attributes['data_proximo_licenciamento']),
        );
    }

    /**
     * @return Attribute
     */
    public function valorLimiteMes(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Mascara::moeda(valor: $this->attributes['valor_limite_mes'],sigla: 'R$ '),
        );
    }
    #endregion
}
