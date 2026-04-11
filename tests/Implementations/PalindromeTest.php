<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\Palindrome;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class PalindromeTest extends TestCase
{
    #[DataProvider('palindromeCases')]
    public function test_it_detects_palindromes(string $value, bool $expected): void
    {
        $this->assertSame(
            $expected,
            Palindrome::isPalindrome($value),
            "Failed for value: \"$value\"."
        );
    }

    public static function palindromeCases(): array
    {
        return [
            'word palindrome' => ['level', true],
            'not a palindrome' => ['hello', false],
            'single character' => ['a', true],
            'empty string' => ['', true],
            'numeric palindrome' => ['1221', true],
            'case ignored' => ['Level', true],
            'spaces ignored' => ['race car', true],
        ];
    }
}
