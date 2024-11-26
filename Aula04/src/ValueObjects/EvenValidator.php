<?php

declare(strict_types=1);

namespace DifferDev\ValueObjects;

use DifferDev\Interfaces\ValidatorInterface;

readonly class EvenValidator implements ValidatorInterface
{
    public function validate(mixed $value): bool
    {
        if (!is_numeric($value)) {
            return false;
        }

        return fmod((float)$value, 2.0) === 0.0;
    }
}

