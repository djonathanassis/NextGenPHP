<?php

declare(strict_types=1);

namespace DifferDev\ValueObjects;

use DifferDev\Interfaces\ValidatorInterface;

class IntegerValidator implements ValidatorInterface
{
    public function validate(mixed $value): bool
    {
        return is_int($value) ||
            (is_string($value) && preg_match('/^-?\d+$/', $value) === 1);
    }
}
