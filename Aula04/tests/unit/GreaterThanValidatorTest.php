<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use DifferDev\ValueObjects\GreaterThanValidator;

#[CoversClass(GreaterThanValidator::class)]
final class GreaterThanValidatorTest extends TestCase
{
    private GreaterThanValidator $validator;

    protected function setUp(): void
    {
        $this->validator = new GreaterThanValidator(10);
    }

    #[DataProvider("validGreaterThanProvider")]
    public function testValidGreaterThan(mixed $input): void
    {
        $this->assertTrue($this->validator->validate($input));
    }

    #[DataProvider("invalidGreaterThanProvider")]
    public function testInvalidGreaterThan(mixed $input): void
    {
        $this->assertFalse($this->validator->validate($input));
    }

    public static function validGreaterThanProvider(): array
    {
        return [
            [11],
            ["15"],
            [10.1],
            ["20.5"],
            ["1e2"],
        ];
    }

    public static function invalidGreaterThanProvider(): array
    {
        return [
            [10],
            ["10"],
            [9.99],
            ["9.99"],
            ["abc"],
            [null],
            [true],
            [" "],
        ];
    }
} 
