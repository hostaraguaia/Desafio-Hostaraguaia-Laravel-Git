<?php

namespace Modules\Vehicle\Entities;

use Modules\Utils\Abstracts\ModelAbstract;
use Modules\Vehicle\Database\Factories\FuelTypeFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FuelType extends ModelAbstract
{
    protected $table = 'fuel_types';
    protected $primary = 'id';

    protected $fillable = [
        'status',
    ];

    protected static function newFactory(): Factory
    {
        return FuelTypeFactory::new();
    }
}
