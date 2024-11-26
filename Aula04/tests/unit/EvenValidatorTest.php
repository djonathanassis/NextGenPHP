<?php

namespace Tests\Unit;

use DifferDev\ValueObjects\EvenValidator;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(EvenValidator::class)]
final class EvenValidatorTest extends TestCase
{
    private EvenValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new EvenValidator();
    }

    #[DataProvider("validEvenProvider")]
    public function testValidEven(mixed $input): void
    {
        $this->assertTrue($this->validator->validate($input));
    }

    #[DataProvider("invalidEvenProvider")]
    public function testInvalidEven(mixed $input): void
    {
        $this->assertFalse($this->validator->validate($input));
    }

    public static function validEvenProvider(): array
    {
        return [
            [2],
            ["4"],
            [0],
            ["0"],
            [100],
            ["200"],
            [2.0],
            ["200.0"],
        ];
    }

    public static function invalidEvenProvider(): array
    {
        return [
            [1],
            ["3"],
            [2.5],
            ["5.5"],
            ["abc"],
            [null],
            [true],
            [" "],
            [-2.2]
        ];
    }
} 
