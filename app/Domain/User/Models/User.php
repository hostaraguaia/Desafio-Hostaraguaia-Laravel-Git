<?php

namespace Crud\Domain\User\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Crud\App\Core\Classes\Mascara;
use Crud\Domain\Frentista\Models\Frentista;
use Crud\Domain\Motorista\Models\Motorista;
use Crud\Domain\Nivel\Models\Nivel;
use Crud\Domain\Posto\Models\Posto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nivel_id',
        'name',
        'username',
        'celular_1',
        'celular_2',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'deleted_at'
    ];

    #region Relations
    public function nivel(): BelongsTo
    {
        return $this->belongsTo(Nivel::class);
    }

    public function motorista(): HasMany
    {
        return $this->hasMany(Motorista::class);
    }

    public function posto(): HasMany
    {
        return $this->hasMany(Posto::class);
    }

    public function frentista(): HasMany
    {
        return $this->hasMany(Frentista::class);
    }

    public function getCadastroAttribute()
    {
        return Mascara::dataHora(
            valor: $this->attributes['created_at'],
            dataAbreviada: true
        );
    }
    #endregion


    #region JWT
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    #endregion
}
