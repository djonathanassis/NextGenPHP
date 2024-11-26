<?php

declare(strict_types=1);

namespace DifferDev\ValueObjects;

use DifferDev\Interfaces\ValidatorInterface;

readonly class FloatValidator implements ValidatorInterface
{
    public function validate(mixed $value): bool
    {
        return is_float($value) ||
            (is_string($value) && preg_match('/^\d+\.\d+([eE][+-]?\d+)?$/', $value) === 1);
    }
}
