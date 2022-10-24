<?php

namespace Modules\Vehicle\Entities;

use Modules\Utils\Abstracts\ModelAbstract;
use Modules\Utils\Enums\StatusEnum;
use Modules\Vehicle\Database\Factories\VehicleFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class Vehicle extends ModelAbstract
{
    protected $table = 'vehicles';
    protected $primary = 'id';

    protected $fillable = [
        'type',
        'category',
        'license_plate',
        'brand',
        'model',
        'manufacture_year',
        'chassis_number',
        'identifier_code',
        'color',
        'average_consumption',
        'monthly_limit_value',
        'next_licensing',
        'notes',
        'tank_capacity',
        'oil_change_limit',
        'fuel',
        'insurer',
        'status',
    ];

    protected static function newFactory(): Factory
    {
        return VehicleFactory::new();
    }

    public function fuel()
    {
        return $this->belongsTo(FuelType::class, 'fuel', 'id');
    }

    public function insurer()
    {
        return $this->belongsTo(Insurer::class, 'insurer', 'id');
    }

    public function drivers()
    {
        return VehicleDriversMap::select('driver')
            ->where('vehicle', $this->id)
            ->where('status', StatusEnum::ACTIVE)
            ->get();
    }
}
