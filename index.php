<?php

use App\Validation\Validator;
use App\Validation\Rules\RequiredRule;

require_once 'vendor/autoload.php';

$validator = new Validator([
    'name' => 'Alex'
]);

$validator->setRules([
    'name' => [
        new RequiredRule(),
    ]
]);

$validator->validate();
