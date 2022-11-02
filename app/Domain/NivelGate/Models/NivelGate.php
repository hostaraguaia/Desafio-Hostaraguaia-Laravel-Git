<?php

namespace Crud\Domain\NivelGate\Models;

use Crud\Domain\Gate\Models\Gate;
use Crud\Domain\Nivel\Models\Nivel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class NivelGate extends Model
{
    use HasFactory;

    protected $fillable = [
        'nivel_id',
        'gate_id'
    ];

    #region Relations
    public function nivel(): BelongsToMany
    {
        return $this->belongsToMany(Nivel::class);
    }

    public function gate(): BelongsToMany
    {
        return $this->belongsToMany(Gate::class);
    }
    #endregion
}
