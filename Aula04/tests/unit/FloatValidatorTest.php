<?php

namespace Tests\Unit;

use DifferDev\ValueObjects\FloatValidator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(FloatValidator::class)]
final class FloatValidatorTest extends TestCase
{
    private FloatValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new FloatValidator();
    }

    #[DataProvider("validFloatProvider")]
    public function testValidFloats(mixed $input): void
    {
        $this->assertTrue($this->validator->validate($input));
    }

    #[DataProvider("invalidFloatProvider")]
    public function testInvalidFloats(mixed $input): void
    {
        $this->assertFalse($this->validator->validate($input));
    }

    #[DataProvider("validFloatProvider")]
    public static function validFloatProvider(): array
    {
        return [
            [3.14],
            ["3.14"],
            ["0.0"],
            ["10.5e+3"],
            ["2.71828E-2"],
        ];
    }

    #[DataProvider("invalidFloatProvider")]
    public static function invalidFloatProvider(): array
    {
        return [
            [null],
            ["abc"],
            ["123"],
            [true],
            ["3,14"],
            ["1.2.3"],
            [" "],
        ];
    }
} 
