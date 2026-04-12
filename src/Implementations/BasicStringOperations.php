<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Perform basic string operations.
 *
 * Given a string, manually count characters, vowels, consonants,
 * numbers, spaces, symbols, and words.
 *
 * Solve it manually using loops and character-by-character checks.
 * Do not rely on built-in helpers that solve the whole task directly.
 *
 * Example:
 * Input: "Hello World 123!"
 * Output: [
 *     'characters' => 16,
 *     'vowels' => 3,
 *     'consonants' => 7,
 *     'numbers' => 3,
 *     'spaces' => 2,
 *     'symbols' => 1,
 *     'words' => 3,
 * ]
 *
 * Complexity Variables:
 * n: number of characters in the string
 */
final class BasicStringOperations
{
    private const VOWELS = ['a', 'e', 'i', 'o', 'u'];

    /**
     * Analyse the string and return the requested metrics.
     *
     * @param string $text
     * @return array{
     *     characters:int,
     *     vowels:int,
     *     numbers:int,
     *     consonants:int,
     *     spaces:int,
     *     symbols:int,
     *     words:int
     * }
     */
    public static function analyse(string $text): array
    {
        $size = strlen($text);

        $analysis = [
            'characters' => $size,
            'vowels' => 0,
            'numbers' => 0,
            'consonants' => 0,
            'spaces' => 0,
            'symbols' => 0,
            'words' => 0,
        ];

        $insideWord = false;

        for ($i = 0; $i < $size; $i++) {
            $char = $text[$i];

            if (self::isVowel($char)) {
                $analysis['vowels']++;
                $analysis['words'] += $insideWord ? 0 : 1;
                $insideWord = true;
            } elseif (self::isLetter($char)) {
                $analysis['consonants']++;
                $analysis['words'] += $insideWord ? 0 : 1;
                $insideWord = true;
            } elseif (self::isNumber($char)) {
                $analysis['numbers']++;
                $analysis['words'] += $insideWord ? 0 : 1;
                $insideWord = true;
            } elseif ($char === ' ') {
                $analysis['spaces']++;
                $insideWord = false;
            } else {
                $analysis['symbols']++;
                $insideWord = false;
            }
        }

        return $analysis;
    }

    private static function isVowel(string $char): bool
    {
        return in_array(strtolower($char), self::VOWELS, true);
    }

    private static function isLetter(string $char): bool
    {
        return ($char >= 'a' && $char <= 'z') || ($char >= 'A' && $char <= 'Z');
    }

    private static function isNumber(string $char): bool
    {
        return $char >= '0' && $char <= '9';
    }
}
