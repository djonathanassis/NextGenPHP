<?php

declare(strict_types=1);

namespace DifferDev\ValueObjects;

use DifferDev\Interfaces\ValidatorInterface;

readonly class GreaterThanValidator implements ValidatorInterface
{
    public function __construct(
        private float|string $compared
    ) {
    }

    public function validate(mixed $value): bool
    {
        if (!is_numeric($value)) {
            return false;
        }
       return (float)$value > $this->compared;
    }
}
