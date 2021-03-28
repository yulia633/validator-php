<?php

namespace App\Validation;

use App\Validation\Rules\Rule;
use App\Validation\Errors\ErrorBag;

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
     */
    protected $errors;

    /**
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
        $this->errors = new ErrorBag();
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
            //dump($rule->getMessage($field));
            $this->errors->add($field, $rule->getMessage($field));
        }
    }

    protected function getFieldValue($field, $data)
    {
        return $data[$field] ?? null;
    }
}
