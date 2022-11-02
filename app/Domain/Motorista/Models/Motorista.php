<?php

namespace Crud\Domain\Motorista\Models;

use Crud\App\Core\Classes\Mascara;
use Crud\Domain\User\Models\User;
use Crud\Domain\Veiculo\Models\Veiculo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motorista extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        "user_id",
        "nome",
        "cpf",
        "matricula",
        "cnh",
        "idade",
        "telefone",
        "telefone_int",
        "tipo_contratacao",
        "celular_1",
        "celular_1_int",
        "celular_2",
        "celular_2_int",
        "email",
        "ativo",
        "nascimento",
    ];

    protected $hidden = [
        "user_id",
    ];


    protected $dates = [
        'deleted_at'
    ];

    #region Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function veiculo(): HasMany
    {
        return $this->hasMany(Veiculo::class);
    }
    #endregion

    #region Mutators
    public function ativoShow(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Mascara::simNao(valor: $this->attributes['ativo'])
        );
    }

    public function nascimento(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Mascara::dataHora(valor: $this->attributes['nascimento'])
        );
    }
    #endregion

}
