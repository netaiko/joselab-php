<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Remove duplicate values from an array.
 *
 * Given an array of values, return a new array that contains only the first
 * occurrence of each value while preserving the original order.
 *
 * Solve it manually without using built-in helpers such as array_unique().
 *
 * Example:
 * - [1, 2, 2, 3, 1] => [1, 2, 3]
 * - ['java', 'php', 'java'] => ['java', 'php']
 *
 * @param array $items
 * @return array
 */
final class RemoveDuplicates
{
    /**
     * Remove duplicate values while keeping the first occurrence of each item.
     *
     * @param array $items
     * @return array
     */
    public static function removeDuplicates(array $items): array
    {
        $result = [];
        $seen = [];

        foreach ($items as $item) {
            if (isset($seen[$item])) {
                continue;
            }

            $seen[$item] = true;
            $result[] = $item;
        }

        return $result;
    }
}
