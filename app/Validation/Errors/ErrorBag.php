<?php

namespace App\Validation\Errors;

class ErrorBag
{
    /**
     * Массив ошибок
     * @var array
     */
    protected $errors = [];

    /**
     *
     */
    public function add($key, $value)
    {
        $this->errors[$key][] = $value;
    }
}
