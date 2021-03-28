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

    /**
     * Есть ли ошибки
     * @return boolean
     */
    public function hasErrors()
    {
        return empty($this->errors);
    }

    /**
     *
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
