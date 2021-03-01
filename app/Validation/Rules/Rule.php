<?php

namespace App\Validation\Rules;

abstract class Rule
{
    /**
     *
     * @param [type] $field
     * @param [type] $value
     * @return void
     */
    abstract public function isEmpty($field, $value);

    /**
     *
     *
     * @param [type] $field
     * @return void
     */
    abstract public function getMessage($field);
}
