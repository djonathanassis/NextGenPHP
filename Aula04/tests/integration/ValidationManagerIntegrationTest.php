<?php

namespace Tests\Integration;

use DifferDev\ValidationManager;
use DifferDev\ValidatorFactory;
use DifferDev\ValueObjects\BooleanValidator;
use DifferDev\ValueObjects\FloatValidator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ValidationManager::class)]
final class ValidationManagerIntegrationTest extends TestCase
{
    private ValidationManager $validationManager;
    private ValidatorFactory $factory;

    protected function setUp(): void
    {
        $this->validationManager = new ValidationManager();
        $this->factory = new ValidatorFactory();
    }

    public function testValidationWithMultipleValidValidators(): void
    {
        $integerValidator = $this->factory->integerValidator();
        $evenValidator = $this->factory->evenValidator();
        $greaterThanValidator = $this->factory->greaterThanValidator(10);

        $this->validationManager
            ->addValidation($integerValidator)
            ->addValidation($evenValidator)
            ->addValidation($greaterThanValidator);

        $value = 12;

        $result = $this->validationManager->validate($value);

        $this->assertTrue($result);
    }

    public function testValidationFailsWhenOneValidatorFails(): void
    {
        $integerValidator = $this->factory->integerValidator();
        $evenValidator = $this->factory->evenValidator();
        $greaterThanValidator = $this->factory->greaterThanValidator(10);

        $this->validationManager
            ->addValidation($integerValidator)
            ->addValidation($evenValidator)
            ->addValidation($greaterThanValidator);

        $value = 9;

        $result = $this->validationManager->validate($value);

        $this->assertFalse($result);
    }

    public function testValidationWithMixedValidators(): void
    {
        $integerValidator = $this->factory->integerValidator();
        $booleanValidator = new BooleanValidator();
        $floatValidator = new FloatValidator();

        $this->validationManager
            ->addValidation($integerValidator)
            ->addValidation($booleanValidator)
            ->addValidation($floatValidator);

        $value = 5;

        $result = $this->validationManager->validate($value);

        $this->assertFalse($result);
    }
} 
