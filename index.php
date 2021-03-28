<?php

use App\Validation\Validator;
use App\Validation\Rules\RequiredRule;
use App\Validation\Rules\EmailRule;

require_once 'vendor/autoload.php';

$validator = new Validator([
    'first_name' => 'Jul',
    'email' => 'ya@ya.ru',
]);

$validator->setRules([
    'first_name' => [
        new RequiredRule(),
    ],
    'email' => [
        new RequiredRule(),
        new EmailRule(),
    ]
]);

// $validator->validate();

// dump($validator);

if (!$validator->validate()) {
    dump($validator->getErrors());
} else {
    dump('Passed!');
}
