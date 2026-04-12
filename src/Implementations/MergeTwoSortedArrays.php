<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Merge two sorted arrays into one sorted array.
 *
 * Given two arrays already sorted in ascending order, merge them into a single
 * sorted array while preserving the ordering.
 *
 * Solve it manually using pointers or indexes.
 * Do not use built-in helpers such as sort(), array_merge() followed by sort(),
 * or similar shortcuts.
 *
 * Example:
 * Input: [1, 3, 5] and [2, 4, 6]
 * Output: [1, 2, 3, 4, 5, 6]
 *
 * All Test Cases:
 * MergeTwoSortedArrays::merge([1, 3, 5], [2, 4, 6]) => [1, 2, 3, 4, 5, 6]
 * MergeTwoSortedArrays::merge([1, 2, 7], [3, 4, 5]) => [1, 2, 3, 4, 5, 7]
 * MergeTwoSortedArrays::merge([], [1, 2, 3]) => [1, 2, 3]
 * MergeTwoSortedArrays::merge([1, 2, 3], []) => [1, 2, 3]
 * MergeTwoSortedArrays::merge([], []) => []
 *
 * Complexity Variables:
 * n: number of elements in the first array
 * m: number of elements in the second array
 */
final class MergeTwoSortedArrays
{
    /**
     * Merge two sorted arrays into one sorted array.
     *
     * @param int[] $left
     * @param int[] $right
     * @return int[]
     */
    public static function merge(array $left, array $right): array
    {
        $sizeLeft = count($left);
        $sizeRight = count($right);

        $indexLeft = 0;
        $indexRight = 0;
        $merged = [];

        while ($indexLeft < $sizeLeft && $indexRight < $sizeRight) {
            if ($left[$indexLeft] <= $right[$indexRight]) {
                $merged[] = $left[$indexLeft];
                $indexLeft++;
            } else {
                $merged[] = $right[$indexRight];
                $indexRight++;
            }
        }

        while ($indexLeft < $sizeLeft) {
            $merged[] = $left[$indexLeft];
            $indexLeft++;
        }

        while ($indexRight < $sizeRight) {
            $merged[] = $right[$indexRight];
            $indexRight++;
        }

        return $merged;
    }
}
