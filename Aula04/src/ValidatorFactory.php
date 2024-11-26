<?php

namespace DifferDev;

use DifferDev\Interfaces\ValidatorInterface;
use DifferDev\ValueObjects\BooleanValidator;
use DifferDev\ValueObjects\EvenValidator;
use DifferDev\ValueObjects\FloatValidator;
use DifferDev\ValueObjects\GreaterThanValidator;
use DifferDev\ValueObjects\IntegerValidator;

final class ValidatorFactory
{
    public function createValidation(): ValidationManager
    {
        return new ValidationManager();
    }

    public function floatValidator(): ValidatorInterface
    {
        return new FloatValidator();
    }

    public function integerValidator(): ValidatorInterface
    {
        return new IntegerValidator();
    }

    public function evenValidator(): ValidatorInterface
    {
        return new EvenValidator();
    }

    public function greaterThanValidator(float|string $value): ValidatorInterface
    {
        return new GreaterThanValidator($value);
    }

    public function booleanValidator(): ValidatorInterface
    {
        return new BooleanValidator();
    }
}
