<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Check whether a string of brackets is valid.
 *
 * Given a string containing only the characters '(', ')', '{', '}', '[' and ']',
 * determine whether the brackets are correctly opened and closed in the proper order.
 *
 * Solve it manually using a stack approach.
 * Do not use built-in helpers or regular expressions to solve the full problem.
 *
 * Example:
 * Input: "()[]{}"
 * Output: true
 *
 * Input: "(]"
 * Output: false
 *
 * All Test Cases:
 * ValidParentheses::isValid('()[]{}') => true
 * ValidParentheses::isValid('([{}])') => true
 * ValidParentheses::isValid('(]') => false
 * ValidParentheses::isValid('([)]') => false
 * ValidParentheses::isValid('') => true
 *
 * Complexity Variables:
 * n: number of characters in the string
 */
final class ValidParentheses
{
    /**
     * Determine whether the brackets in the string are valid.
     *
     * @param string $value
     * @return bool
     */
    public static function isValid(string $value): bool
    {
        $size = strlen($value);

        $pairs = [
            '(' => ')',
            '[' => ']',
            '{' => '}',
        ];

        $stack = [];

        for ($i = 0; $i < $size; $i++) {
            $char = $value[$i];

            if ($char === '(' || $char === '[' || $char === '{') {
                $stack[] = $char;
            } elseif ($char === ')' || $char === ']' || $char === '}') {
                $lastOpeningBracket = array_pop($stack);

                if ($lastOpeningBracket === null || $char !== $pairs[$lastOpeningBracket]) {
                    return false;
                }
            }
        }

        return empty($stack);
    }
}
