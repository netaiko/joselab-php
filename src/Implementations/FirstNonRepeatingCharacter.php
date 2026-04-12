<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Find the first non-repeating character in a string.
 *
 * Given a string, return the first character that appears only once.
 * If all characters repeat, return null.
 *
 * Solve it manually by counting occurrences and then scanning again
 * in the original order.
 * Do not use built-in helpers that solve the problem directly.
 *
 * Example:
 * Input: "swiss"
 * Output: "w"
 *
 * All Test Cases:
 * FirstNonRepeatingCharacter::find('swiss') => 'w'
 * FirstNonRepeatingCharacter::find('aabbccd') => 'd'
 * FirstNonRepeatingCharacter::find('aabbcc') => null
 * FirstNonRepeatingCharacter::find('x') => 'x'
 *
 * Complexity Variables:
 * n: number of characters in the string
 */
final class FirstNonRepeatingCharacter
{
    /**
     * Return the first character that appears only once.
     *
     * @param string $value
     * @return string|null
     */
    public static function find(string $value): ?string
    {
        $size = strlen($value);

        if ($size === 0) {
            return null;
        }

        $counts = [];

        for ($i = 0; $i < $size; $i++) {
            $char = $value[$i];
            $counts[$char] = ($counts[$char] ?? 0) + 1;
        }

        for ($i = 0; $i < $size; $i++) {
            $char = $value[$i];

            if ($counts[$char] === 1) {
                return $char;
            }
        }

        return null;
    }
}
