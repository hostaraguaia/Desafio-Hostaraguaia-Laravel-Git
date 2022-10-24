<?php

namespace Modules\Vehicle\Entities;

use Modules\Users\Entities\Driver;
use Modules\Vehicle\Entities\Vehicle;
use Modules\Vehicle\Database\Factories\VehicleDriversMapFactory;
use Modules\Utils\Abstracts\ModelAbstract;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleDriversMap extends ModelAbstract
{
    protected $table = 'vehicle_drivers_maps';
    protected $primary = 'id';

    protected $fillable = [
        'driver',
        'vehicle',
        'status',
    ];

    protected static function newFactory(): Factory
    {
        return VehicleDriversMapFactory::new();
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver', 'id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle', 'id');
    }
}
