<?php

namespace App\Validation;

class Validator
{
    /**
     *
     */
    protected $data = [];

    /**
     *
     */
    protected $rules = [];

    /**
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     *
     * @param array $rules
     * @return void
     */
    public function setRules(array $rules)
    {
        $this->rules = $rules;
    }
}
