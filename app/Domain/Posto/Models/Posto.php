<?php

namespace Crud\Domain\Posto\Models;

use Crud\Domain\Frentista\Models\Frentista;
use Crud\Domain\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "user_id",
        "nome_fantasia",
        "razao_social",
        "cnpj",
        "logradouro",
        "cep",
        "complemento",
        "bairro",
        "cidade",
        "uf",
        "responsavel",
        "telefone",
        "telefone_int",
        "email",
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $hidden = [
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function frentista(): HasMany
    {
        return $this->hasMany(Frentista::class);
    }
}
