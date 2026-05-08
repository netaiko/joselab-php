<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\AlphabetValueCalculator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class AlphabetValueCalculatorTest extends TestCase
{
    #[DataProvider('calculateCases')]
    public function test_it_calculates_the_alphabet_value_of_a_string(string $value, int $expected): void
    {
        $this->assertSame(
            $expected,
            AlphabetValueCalculator::calculate($value),
            "Failed for value: {$value}"
        );
    }

    public static function calculateCases(): array
    {
        return [
            'single lowercase letter' => [
                'a',
                1,
            ],
            'single uppercase letter' => [
                'A',
                1,
            ],
            'last lowercase letter of the alphabet' => [
                'z',
                26,
            ],
            'last uppercase letter of the alphabet' => [
                'Z',
                26,
            ],
            'basic lowercase string' => [
                'abc',
                6,
            ],
            'basic uppercase string' => [
                'ABC',
                6,
            ],
            'mixed case string' => [
                'aBc',
                6,
            ],
            'word hello' => [
                'hello',
                52,
            ],
            'word with spaces' => [
                'hello world',
                124,
            ],
            'letters numbers spaces and symbol' => [
                'PHP 8!',
                40,
            ],
            'empty string' => [
                '',
                0,
            ],
            'only numbers and symbols' => [
                '123 !?',
                0,
            ],
        ];
    }
}
