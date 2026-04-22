<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Find the first recurring character in a string after normalising it.
 *
 * You are given a string that may contain letters, digits, spaces, and symbols.
 *
 * Ignore all non-alphanumeric characters.
 * Compare letters case-insensitively.
 *
 * Return the first character whose second appearance is encountered first
 * during a left-to-right scan.
 *
 * Return '_' if no character repeats.
 *
 * Solve it in O(n) time.
 *
 * Example:
 * Input: "A-b!c-a"
 * Output: "a"
 *
 * All Test Cases:
 * FirstRecurringNormalisedCharacter::find('A-b!c-a') => 'a'
 * FirstRecurringNormalisedCharacter::find('123@#31') => '3'
 * FirstRecurringNormalisedCharacter::find('abc') => '_'
 * FirstRecurringNormalisedCharacter::find('Swiss') => 's'
 * FirstRecurringNormalisedCharacter::find('abBA') => 'b'
 * FirstRecurringNormalisedCharacter::find('aA') => 'a'
 */
final class FirstRecurringNormalisedCharacter
{
    public static function find(string $value): string
    {
        $buffer = [];
        $length = strlen($value);

        for ($i = 0; $i < $length; $i++) {
            $char = strtolower($value[$i]);

            if (($char >= 'a' && $char <= 'z') || ($char >= '0' && $char <= '9')) {
                if (isset($buffer[$char])) {
                    return $char;
                }

                $buffer[$char] = true;
            }
        }

        return '_';
    }
}
