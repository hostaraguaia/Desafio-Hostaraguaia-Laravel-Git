<?php

namespace Crud\Domain\Frentista\Models;

use Crud\Domain\Posto\Models\Posto;
use Crud\Domain\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Frentista extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "user_id",
        "posto_id",
        "nome",
        "email",
        "telefone",
        "telefone_int",
    ];
    protected $hidden = [
        "user_id",
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function posto(): BelongsTo
    {
        return $this->belongsTo(Posto::class);
    }
}
