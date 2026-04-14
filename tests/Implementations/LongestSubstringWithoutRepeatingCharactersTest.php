<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\LongestSubstringWithoutRepeatingCharacters;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class LongestSubstringWithoutRepeatingCharactersTest extends TestCase
{
    #[DataProvider('longestSubstringCases')]
    public function test_it_returns_the_length_of_the_longest_substring_without_repeating_characters(
        string $text,
        int $expected
    ): void {
        $this->assertSame(
            $expected,
            LongestSubstringWithoutRepeatingCharacters::length($text),
            'Failed for input: ' . json_encode([
                'text' => $text,
            ])
        );
    }

    public static function longestSubstringCases(): array
    {
        return [
            'returns 3 for abcabcbb' => ['abcabcbb', 3],
            'returns 1 for bbbbb' => ['bbbbb', 1],
            'returns 3 for pwwkew' => ['pwwkew', 3],
            'returns 0 for empty string' => ['', 0],
            'returns 6 for all unique characters' => ['abcdef', 6],
            'returns 2 for aab' => ['aab', 2],
            'returns 2 for abba' => ['abba', 2],
            'returns 3 for dvdf' => ['dvdf', 3],
            'returns 5 for tmmzuxt' => ['tmmzuxt', 5],
            'returns 1 for single character' => ['a', 1],
        ];
    }
}
