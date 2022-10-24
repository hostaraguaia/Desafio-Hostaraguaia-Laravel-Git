<?php

namespace Modules\Users\Entities;

use Modules\Users\Entities\User;
use Modules\Contact\Entities\Address;
use Modules\Contact\Entities\ContactInfo;
use Modules\Utils\Abstracts\ModelAbstract;
use Modules\Users\Database\Factories\DriverFactory;

class Driver extends ModelAbstract
{
    protected $table = 'drivers';
    protected $primary = 'id';

    protected $fillable = [
        'user',
        'name',
        'document',
        'registration',
        'licence',
        'birth_date',
        'hiring_type',
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user', 'id');
    }

    protected static function newFactory()
    {
        return DriverFactory::new();
    }
}
