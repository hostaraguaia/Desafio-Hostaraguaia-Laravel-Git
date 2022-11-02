<?php

namespace Crud\Domain\Nivel\Models;

use Crud\Domain\NivelGate\Models\NivelGate;
use Crud\Domain\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nivel extends Model
{
    use HasFactory;

    protected $table = 'niveis';

    protected $fillable = [
        'nome',
        'gate'
    ];

    #region Relations
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function nivelGate(): HasMany
    {
        return $this->hasMany(NivelGate::class);
    }
    #endregion
}
