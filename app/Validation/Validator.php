<?php

namespace App\Validation;

use App\Validation\Rules\Rule;

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

    public function validate()
    {
        foreach ($this->rules as $field => $rules) {
            foreach ($rules as $rule) {
                $this->validateRule($field, $rule);
            }
        }
    }

    protected function validateRule($field, Rule $rule)
    {
        if (!$rule->required($field, $this->getFieldValue($field, $this->data))) {
            //
        }
    }

    protected function getFieldValue($field, $data)
    {
        return $data[$field] ?? null;
    }
}
