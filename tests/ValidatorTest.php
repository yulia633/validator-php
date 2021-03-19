<?php

namespace App\Validation\Tests;

use PHPUnit\Framework\TestCase;
use App\Validation\Validator;
use App\Validation\Rules\RequiredRule;

class ValidatorTest extends TestCase
{
    // private Validator $validator;

    // protected function setUp(): void
    // {
    //     $this->validator = new Validator();
    // }

    public function testRulesEmpty()
    {
        $rule = new RequiredRule();

        $field = " ";
        $this->assertEquals("  is required", $rule->getMessage($field));
    }
}
