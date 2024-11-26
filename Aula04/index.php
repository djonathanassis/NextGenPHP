<?php
declare(strict_types=1);

use DifferDev\ValidatorFactory;

require 'vendor/autoload.php';

$factory = new ValidatorFactory();

$validationGroup = $factory->createValidation()
    ->addValidation($factory->integerValidator())
    ->addValidation($factory->greaterThanValidator("5"));

$value = "6";

$result = $validationGroup->validate($value);

var_dump($result); // bool(true)
