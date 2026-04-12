<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Reverse the elements of an array.
 *
 * Given an array, return a new array with the elements in reverse order.
 *
 * Solve it manually using indexes or two pointers.
 * Do not use built-in helpers such as array_reverse().
 *
 * Example:
 * Input: [1, 2, 3, 4]
 * Output: [4, 3, 2, 1]
 *
 * All Test Cases:
 * ReverseArray::reverse([1, 2, 3, 4]) => [4, 3, 2, 1]
 * ReverseArray::reverse(['php', 'java', 'python']) => ['python', 'java', 'php']
 * ReverseArray::reverse([7]) => [7]
 * ReverseArray::reverse([]) => []
 *
 * Complexity Variables:
 * n: number of elements in the array
 */
final class ReverseArray
{
    /**
     * Return a new array with the elements in reverse order.
     *
     * @param array $items
     * @return array
     */
    public static function reverse(array $items): array
    {
        $size = count($items);
        $halfSize = intdiv($size, 2);
        $reversed = $items;

        for ($i = 0; $i < $halfSize; $i++) {
            $j = $size - $i - 1;
            $reversed[$i] = $items[$j];
            $reversed[$j] = $items[$i];
        }

        return $reversed;
    }
}
