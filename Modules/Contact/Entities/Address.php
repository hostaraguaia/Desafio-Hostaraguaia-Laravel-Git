<?php

namespace Modules\Contact\Entities;

use Modules\Utils\Abstracts\ModelAbstract;
use Modules\Contact\Database\Factories\AddressFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\Factory;

class Address extends ModelAbstract
{
    protected $table = 'addresses';
    protected $primary = 'id';

    protected $fillable = [
        'status',
        'responsable_id',
        'responsable_type',
        'address',
        'zip_code',
        'complement',
        'district',
        'city',
    ];

    protected static function newFactory(): Factory
    {
        return AddressFactory::new();
    }

    public function responsable(): MorphTo
    {
        return $this->morphTo('responsable', 'responsable_type', 'responsable_id', 'id');
    }
}
