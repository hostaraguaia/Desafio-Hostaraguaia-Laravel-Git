<?php

namespace Modules\Vehicle\Entities;

use Modules\Utils\Abstracts\ModelAbstract;
use Modules\Vehicle\Database\Factories\InsurerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class Insurer extends ModelAbstract
{
    protected $table = 'insurers';
    protected $primary = 'id';

    protected $fillable = [
        'name',
        'policy_number',
        'due_date',
        'price',
        'status',
    ];

    protected static function newFactory(): Factory
    {
        return InsurerFactory::new();
    }
}
