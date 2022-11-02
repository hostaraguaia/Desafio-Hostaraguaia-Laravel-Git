<?php

namespace Crud\Domain\Gate\Models;

use Crud\Domain\NivelGate\Models\NivelGate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gate extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome'
    ];

    #region Relations
    public function nivel(): HasMany
    {
        return $this->hasMany(NivelGate::class);
    }
    #endregion
}
