<?php

use App\Validation\Validator;
use App\Validation\Rules\RequiredRule;

require_once 'vendor/autoload.php';

$validator = new Validator([
    'first_name' => '',
    'email' => 'ya',
]);

$validator->setRules([
    'first_name' => [
        'required',
    ],
    'email' => [
       new RequiredRule(),
       'email',
    ]
]);

// $validator->validate();

// dump($validator);

if (!$validator->validate()) {
    dump($validator->getErrors());
} else {
    dump('Passed!');
}
