<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use DifferDev\ValueObjects\BooleanValidator;

#[CoversClass(BooleanValidator::class)]
final class BooleanValidatorTest extends TestCase
{
    private BooleanValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new BooleanValidator();
    }

    #[DataProvider("validBooleanProvider")]
    public function testValidBooleans(mixed $input): void
    {
        $this->assertTrue($this->validator->validate($input));
    }

    #[DataProvider("invalidBooleanProvider")]
    public function testInvalidBooleans(mixed $input): void
    {
        $this->assertFalse($this->validator->validate($input));
    }

    public static function validBooleanProvider(): array
    {
        return [
            [true],
            [false],
            ["true"],
            ["false"],
            ["TRUE"],
            ["FALSE"],
            ["1"],
            ["0"],
        ];
    }

    public static function invalidBooleanProvider(): array
    {
        return [
            ["yes"],
            ["no"],
            ["on"],
            ["off"],
            ["2"],
            [1],
            [0],
            [null],
            [" "],
        ];
    }
} 
