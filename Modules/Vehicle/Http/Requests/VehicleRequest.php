<?php

namespace Modules\Vehicle\Http\Requests;

use Modules\Utils\Rules\UuidRule;
use Modules\Utils\Enums\StatusEnum;
use Modules\Utils\Abstracts\FormRequestAbstract;

use Modules\Vehicle\Enums\VehicleTypeEnum;
use Modules\Vehicle\Enums\VehicleCategoryEnum;

use Illuminate\Validation\Rule;

class VehicleRequest extends FormRequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
                return $this->getRules();

            case 'POST':
                return $this->postRules();

            case 'PUT':
                return $this->putRules();

            case 'DELETE':
                return $this->deleteRules();

            default:
                return $this->postRules();
        }
    }

    protected function getRules()
    {
        $rules = [
            'id'                  => ['nullable', new UuidRule],
            'fuel'                => ['nullable', new UuidRule],
            'insurer'             => ['nullable', new UuidRule],
            'driver'              => ['required', new UuidRule],
            'type'                => ['nullable', Rule::in(VehicleTypeEnum::keys())],
            'category'            => ['nullable', Rule::in(VehicleCategoryEnum::keys())],
            'license_plate'       => ['nullable', 'string', 'max:255'],
            'brand'               => ['nullable', 'string', 'max:255'],
            'model'               => ['nullable', 'string', 'max:255'],
            'color'               => ['nullable', 'string', 'max:255'],
            'notes'               => ['nullable', 'string'],
            'next_licensing'      => ['nullable', 'date:Y-m-d h:i:s'],
            'monthly_limit_value' => ['nullable', 'numeric', 'between:0,9999999999.99'],
            'manufacture_year'    => ['nullable', 'digit', 'max:5'],
            'chassis_number'      => ['nullable', 'digit', 'max:25'],
            'average_consumption' => ['nullable', 'digit'],
            'tank_capacity'       => ['nullable', 'digit', 'max:3'],
            'oil_change_limit'    => ['nullable', 'digit', 'max:5'],
            'identifier_code'     => ['nullable', 'digit'],
            'status'              => ['nullable', Rule::in(StatusEnum::keys())],
            'created_at'          => ['nullable', 'date:Y-m-d h:i:s'],
            'updated_at'          => ['nullable', 'date:Y-m-d h:i:s'],
            'deleted_at'          => ['nullable', 'date:Y-m-d h:i:s']
        ];

        return $rules;
    }

    protected function postRules()
    {
        $rules = [
            'fuel'                => ['nullable', new UuidRule],
            'insurer'             => ['nullable', new UuidRule],
            'driver'              => ['required', new UuidRule],
            'license_plate'       => ['required', 'string', 'max:255'],
            'brand'               => ['nullable', 'string', 'max:255'],
            'model'               => ['nullable', 'string', 'max:255'],
            'color'               => ['nullable', 'string', 'max:255'],
            'notes'               => ['nullable', 'string'],
            'next_licensing'      => ['nullable', 'date:Y-m-d h:i:s'],
            'monthly_limit_value' => ['nullable', 'numeric', 'between:0,9999999999.99'],
            'manufacture_year'    => ['required', 'digit', 'max:5'],
            'chassis_number'      => ['nullable', 'digit', 'max:25'],
            'average_consumption' => ['nullable', 'digit'],
            'tank_capacity'       => ['nullable', 'digit', 'max:3'],
            'oil_change_limit'    => ['nullable', 'digit', 'max:5'],
            'identifier_code'     => ['nullable', 'digit'],
            'type'                => ['required', Rule::in(VehicleTypeEnum::keys())],
            'category'            => ['required', Rule::in(VehicleCategoryEnum::keys())],
            'status'              => ['nullable', Rule::in(StatusEnum::keys())],
        ];

        return $rules;
    }

    protected function putRules()
    {
        $rules = [
            'id'                  => ['required', new UuidRule],
            'fuel'                => ['nullable', new UuidRule],
            'insurer'             => ['nullable', new UuidRule],
            'driver'              => ['nullable', new UuidRule],
            'license_plate'       => ['nullable', 'string', 'max:255'],
            'brand'               => ['nullable', 'string', 'max:255'],
            'model'               => ['nullable', 'string', 'max:255'],
            'color'               => ['nullable', 'string', 'max:255'],
            'notes'               => ['nullable', 'string'],
            'next_licensing'      => ['nullable', 'date:Y-m-d h:i:s'],
            'monthly_limit_value' => ['nullable', 'numeric', 'between:0,9999999999.99'],
            'manufacture_year'    => ['nullable', 'digit', 'max:5'],
            'chassis_number'      => ['nullable', 'digit', 'max:25'],
            'average_consumption' => ['nullable', 'digit'],
            'tank_capacity'       => ['nullable', 'digit', 'max:3'],
            'oil_change_limit'    => ['nullable', 'digit', 'max:5'],
            'identifier_code'     => ['nullable', 'digit'],
            'type'                => ['nullable', Rule::in(VehicleTypeEnum::keys())],
            'category'            => ['nullable', Rule::in(VehicleCategoryEnum::keys())],
            'status'              => ['nullable', Rule::in(StatusEnum::keys())],
        ];

        return $rules;
    }

    protected function deleteRules()
    {
        $rules = [
            'id' => ['required', new UuidRule]
        ];

        return $rules;
    }
}
