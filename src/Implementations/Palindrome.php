<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

final class Palindrome
{

    /**
     * Determine whether the given string is a palindrome.
     *
     * A palindrome is a value that reads the same forwards and backwards.
     * This implementation ignores letter case and spaces.
     *
     * Example:
     * Input: "race car"
     * Output: true
     *
     * @param string $value
     * @return bool True when the value is a palindrome, otherwise false
     */
    public static function isPalindrome(string $value): bool
    {
        $normalised = strtolower(str_replace(' ', '', $value));
        $size = strlen($normalised);
        $halfSize = intdiv($size, 2);

        for ($i = 0; $i < $halfSize; $i++) {
            if ($normalised[$i] !== $normalised[$size - $i - 1]) {
                return false;
            }
        }
        return true;
    }


    /**
     * Determine whether the given string is a palindrome using native PHP functions.
     *
     * A palindrome is a value that reads the same forwards and backwards.
     * This implementation ignores letter case and spaces.
     *
     * Example:
     * Input: "race car"
     * Output: true
     *
     * @param string $value
     * @return bool True when the value is a palindrome, otherwise false
     */
    public static function isPalindromeWithNativePHP(string $value): bool
    {
        $normalised = strtolower(str_replace(' ', '', $value));

        return $normalised === strrev($normalised);
    }
}
