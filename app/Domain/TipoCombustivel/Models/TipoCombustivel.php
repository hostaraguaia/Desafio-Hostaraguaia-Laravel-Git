<?php

namespace Crud\Domain\TipoCombustivel\Models;

use Crud\App\Core\Classes\Mascara;
use Crud\Domain\Veiculo\Models\Veiculo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoCombustivel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipo_combustiveis';

    protected $fillable = [
        "nome",
        "valor",
        "observacoes",
    ];

    protected $dates = [
        'deleted_at'
    ];

    #region Relations
    public function veiculo(): HasMany
    {
        return $this->hasMany(Veiculo::class);
    }
    #endregion

    #region Mutators
    /**
     * @return Attribute
     */
    public function valor(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Mascara::moeda(valor: $this->attributes['valor'], sigla: 'R$ '),
        );
    }
    #endregion
}
