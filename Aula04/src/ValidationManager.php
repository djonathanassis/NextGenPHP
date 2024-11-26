<?php
declare(strict_types=1);

namespace DifferDev;

use DifferDev\Interfaces\ValidatorInterface;

class ValidationManager
{
    /**
     * @var ValidatorInterface[]
     */
    private array $validations = [];

    public function addValidation(ValidatorInterface $validation): self
    {
        $this->validations[] = $validation;
        return $this;
    }

    public function validate(mixed $value): bool
    {
        foreach ($this->validations as $validation) {
            if (!$validation->validate($value)) {
                return false;
            }
        }
        return true;
    }
} 
