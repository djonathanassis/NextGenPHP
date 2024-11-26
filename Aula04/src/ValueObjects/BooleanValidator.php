<?php

declare(strict_types=1);

namespace DifferDev\ValueObjects;

use DifferDev\Interfaces\ValidatorInterface;

readonly class BooleanValidator implements validatorInterface
{
    public function validate(mixed $value): bool
    {
        return is_bool($value) ||
            (is_string($value) && preg_match('/^(true|false|1|0)$/i', $value) === 1);
    }
}
