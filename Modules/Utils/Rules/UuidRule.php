<?php

namespace Modules\Utils\Rules;

use Ramsey\Uuid\Uuid as UuidValidator;
use Illuminate\Contracts\Validation\Rule;

class UuidRule implements Rule
{
   /**
     * Validate UUID
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return UuidValidator::isValid($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Supplied :attribute is not valid UUID!';
    }
}
