<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

final class AlphabetValueCalculator
{
    /**
     * Calculate the alphabet value of a string.
     *
     * Each letter is converted to its position in the English alphabet:
     * a = 1, b = 2, c = 3, ..., z = 26.
     *
     * Uppercase and lowercase letters are treated the same.
     * Non-letter characters such as spaces, numbers and symbols are ignored.
     *
     * Example:
     * Input: "abc"
     * Output: 6
     *
     * Explanation:
     * a = 1
     * b = 2
     * c = 3
     * Total = 1 + 2 + 3 = 6
     *
     * Another example:
     * Input: "PHP 8!"
     * Output: 40
     *
     * Explanation:
     * p = 16
     * h = 8
     * p = 16
     * Total = 16 + 8 + 16 = 40
     *
     * @param string $value
     * @return int
     */
    public static function calculate(string $value): int
    {
        $sum = 0;
        $value = strtolower($value);
        $size = strlen($value);

        for ($i = 0; $i < $size; $i++) {
            $character = $value[$i];

            if ($character < 'a' || $character > 'z') {
                continue;
            }

            $sum += ord($character) - ord('a') + 1;
        }

        return $sum;
    }
}
