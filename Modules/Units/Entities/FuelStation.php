<?php

namespace Modules\Units\Entities;

use Modules\Users\Entities\User;
use Modules\Contact\Entities\Address;
use Modules\Contact\Entities\ContactInfo;
use Modules\Utils\Abstracts\ModelAbstract;
use Modules\Units\Database\Factories\FuelStationFactory;

class FuelStation extends ModelAbstract
{
    protected $table = 'fuelstation';
    protected $primary = 'id';

    protected $fillable = [
        'company_name',
        'trading_name',
        'verified_at',
        'document',
        'loggable',
        'status',
    ];

    public function address()
    {
        return $this->morphOne(Address::class, 'responsable');
    }

    public function contact()
    {
        return $this->morphOne(ContactInfo::class, 'responsable');
    }

    public function loggable()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    protected static function newFactory()
    {
        return FuelStationFactory::new();
    }
}
