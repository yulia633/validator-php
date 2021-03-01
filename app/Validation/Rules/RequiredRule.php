<?php

namespace App\Validation\Rules;

use App\Validation\Rules\Rule;

class RequiredRule extends Rule
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
        return !empty($value);
    }

    /**
     *
     * @param [type] $field
     * @return string
     */
    public function getMessage($field)
    {
        return $field . ' is required';
    }
}
