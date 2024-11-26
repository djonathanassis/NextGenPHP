<?php

namespace DifferDev\Interfaces;

interface ValidatorInterface
{
    public function validate(mixed $value): bool;
}
