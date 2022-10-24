<?php

namespace Modules\Utils\Validation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Validation
{
    public static function Validate($request, $fields = [], $rules = 'required')
    {
        if (!$request instanceof Request && !is_array($request))
            throw new \Exception("request must be of type Array or Illuminate\Http\Request", 1);

        if ($request instanceof Request)
            $request = $request->all();

        $validator = self::Format($request, $fields, $rules);
        return $validator->validate();
    }

    public static function ValidateRequest(Request $request, $fields = [], $rules = null)
    {
        $validator = self::Format($request->all(), $fields, $rules);

        if ($validator->fails())
            return false;

        return true;
    }

    public static function ValidateArray($data, $fields = [], $rules = null)
    {
        $validator = self::Format($data, $fields, $rules);

        if ($validator->fails())
            return false;

        return true;
    }

    public static function ValidationErrorsToString(array $errArray)
    {
        $valArr = [];
        foreach ($errArray as $key => $value) {
            $errStr = $key . ' ' . $value[0];
            array_push($valArr, $errStr);
        }

        if (!empty($valArr))
            $errStrFinal = implode(',', $valArr);

        return $errStrFinal;
    }

    private static function Format(array $data, $fields = [], $rules = null)
    {
        $rules = $rules === null  ? 'required' : $rules;

        if ((!is_array(($rules)) && !is_string(($rules))))
            throw new \Exception("rules must be of type array or string", 1);

        $validator = Validator::make(
            $data,
            self::CreateValidate($fields, $rules)
        );

        return $validator;
    }

    private static function CreateValidate($fields, $rules)
    {
        $data = [];

        foreach ($fields as $field)
            $data[$field] = $rules;

        return $data;
    }
}
