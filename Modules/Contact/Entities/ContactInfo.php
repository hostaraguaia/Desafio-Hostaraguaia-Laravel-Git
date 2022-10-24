<?php

namespace Modules\Contact\Entities;

use Modules\Utils\Abstracts\ModelAbstract;
use Modules\Contact\Database\Factories\ContactInfoFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactInfo extends ModelAbstract
{
    protected $table = 'contact_informations';
    protected $primary = 'id';

    protected $fillable = [
        'status',
        'responsable_id',
        'responsable_type',
        'ddd',
        'phone',
        'ddd_secondary',
        'phone_secondary',
        'ddd_backup',
        'phone_backup',
        'email',
        'email_verified_at',
        'email_secondary',
        'email_secondary_verified_at',
    ];

    protected static function newFactory(): Factory
    {
        return ContactInfoFactory::new();
    }

    public function responsable(): MorphTo
    {
        return $this->morphTo('responsable', 'responsable_type', 'responsable_id', 'id');
    }
}
