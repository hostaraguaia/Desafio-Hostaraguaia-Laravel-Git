<?php

namespace Modules\Users\Entities;

use Modules\Contact\Entities\Address;
use Modules\Contact\Entities\ContactInfo;
use Modules\Utils\Abstracts\ModelAbstract;
use Modules\Users\Database\Factories\AttendantFactory;

class Attendant extends ModelAbstract
{
    protected $table = 'attendants';
    protected $primary = 'id';

    protected $fillable = [
        'name',
        'user',
        'employable_id',
        'employable_type',
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

    public function employable()
    {
        return $this->morphTo('employable', 'employable_type', 'employable_id');
    }

    protected static function newFactory()
    {
        return AttendantFactory::new();
    }
}
