<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use DifferDev\ValidationManager;
use DifferDev\ValueObjects\FloatValidator;
use DifferDev\ValueObjects\GreaterThanValidator;

#[CoversClass(ValidationManager::class)]
final class ValidationManagerTest extends TestCase
{
    private ValidationManager $validationManager;

    protected function setUp(): void
    {
        $this->validationManager = new ValidationManager();
    }

    public function testValidationManagerPasses(): void
    {
        $this->validationManager
            ->addValidation(new FloatValidator())
            ->addValidation(new GreaterThanValidator(10));

        $this->assertTrue($this->validationManager->validate("15.5"));
    }

    public function testValidationManagerFailsFloat(): void
    {
        $this->validationManager
            ->addValidation(new FloatValidator())
            ->addValidation(new GreaterThanValidator(10));

        $this->assertFalse($this->validationManager->validate("abc"));
    }

    public function testValidationManagerFailsGreaterThan(): void
    {
        $this->validationManager
            ->addValidation(new FloatValidator())
            ->addValidation(new GreaterThanValidator(10));

        $this->assertFalse($this->validationManager->validate("5.5"));
    }

    public function testValidationManagerWithNoValidations(): void
    {
        $this->assertTrue($this->validationManager->validate("any value"));
    }
} 
