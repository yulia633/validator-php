<?php

namespace App\Validation;

use App\Validation\Rules\Rule;
use App\Validation\Errors\ErrorBag;
use App\Validation\Rules\RequiredRule;
use App\Validation\Rules\EmailRule;

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

    protected $ruleMap = [
        'required' => RequiredRule::class,
        'email' => EmailRule::class,
    ];

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
            //dump($this->resolveRules($rules));
            foreach ($this->resolveRules($rules) as $rule) {
                $this->validateRule($field, $rule);
            }
        }

        return $this->errors->hasErrors();
    }

    /**
     *
     * @param array $rules
     * @return void
     */
    protected function resolveRules($rules)
    {
        return array_map(function ($rule) {
            if (is_string($rule)) {
                return $this->getRuleFromString($rule);
            }

            return $rule;
        }, $rules);
    }

    protected function getRuleFromString($rule)
    {
        return new $this->ruleMap[$rule]();
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

    public function getErrors()
    {
        return $this->errors->getErrors();
    }
}
