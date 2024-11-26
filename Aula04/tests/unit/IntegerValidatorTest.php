<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use DifferDev\ValueObjects\IntegerValidator;

#[CoversClass(IntegerValidator::class)]
final class IntegerValidatorTest extends TestCase
{
    private IntegerValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new IntegerValidator();
    }

    #[DataProvider("validIntegerProvider")]
    public function testValidIntegers(mixed $input): void
    {
        $this->assertTrue($this->validator->validate($input));
    }

    #[DataProvider("invalidIntegerProvider")]
    public function testInvalidIntegers(mixed $input): void
    {
        $this->assertFalse($this->validator->validate($input));
    }

    public static function validIntegerProvider(): array
    {
        return [
            [123],
            ["123"],
            ["0"],
            ["456789"],
        ];
    }

    public static function invalidIntegerProvider(): array
    {
        return [
            [123.45],
            ["123.45"],
            ["abc"],
            ["12a3"],
            [null],
            [true],
            [" "],
        ];
    }
} 
