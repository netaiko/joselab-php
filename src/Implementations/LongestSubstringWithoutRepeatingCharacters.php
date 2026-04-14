<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Find the length of the longest substring without repeating characters.
 *
 * Given a string, return the length of the longest substring that contains
 * no repeated characters.
 *
 * Solve it manually using a sliding window approach.
 * Do not use built-in helpers that solve the problem directly.
 *
 * Example:
 * Input: "abcabcbb"
 * Output: 3
 *
 * Input: "bbbbb"
 * Output: 1
 *
 * All Test Cases:
 * LongestSubstringWithoutRepeatingCharacters::length('abcabcbb') => 3
 * LongestSubstringWithoutRepeatingCharacters::length('bbbbb') => 1
 * LongestSubstringWithoutRepeatingCharacters::length('pwwkew') => 3
 * LongestSubstringWithoutRepeatingCharacters::length('') => 0
 * LongestSubstringWithoutRepeatingCharacters::length('abcdef') => 6
 *
 * Complexity Variables:
 * n: number of characters in the string
 */
final class LongestSubstringWithoutRepeatingCharacters
{
    /**
     * Return the length of the longest substring without repeated characters.
     *
     * @param string $text
     * @return int
     */
    public static function length(string $text): int
    {
        $size = strlen($text);

        if ($size === 0) {
            return 0;
        }

        $seen = [];
        $left = 0;
        $maxLength = 0;

        for ($right = 0; $right < $size; $right++) {

            $char = $text[$right];

            while (isset($seen[$char])) {
                $leftChar = $text[$left];
                unset($seen[$leftChar]);
                $left++;
            }

            $seen[$char] = true;
            $currentLength = $right - $left + 1;

            if ($currentLength > $maxLength) {
                $maxLength = $currentLength;
            }
        }

        return $maxLength;
    }
}
