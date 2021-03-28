<?php

namespace App\Validation\Rules;

use App\Validation\Rules\Rule;

class EmailRule extends Rule
{
    /**
     * Не пустые данные
     *
     * @param [type] $field
     * @param [type] $value
     * @return boolean
     */
    public function required($field, $value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    /**
     *
     * @param [type] $field
     * @return string
     */
    public function getMessage($field)
    {
        return $field . ' must be a valid email address';
    }
}
