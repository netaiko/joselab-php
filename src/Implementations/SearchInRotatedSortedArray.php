<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Search for a target value in a rotated sorted array.
 *
 * You are given an array of distinct integers sorted in ascending order
 * and then rotated at an unknown pivot.
 *
 * Return the index of the target if it exists, otherwise return -1.
 *
 * Solve it in O(log n) time.
 * Do not use a linear scan.
 *
 * Example:
 * Input: [4, 5, 6, 7, 0, 1, 2], 0
 * Output: 4
 *
 * All Test Cases:
 * SearchInRotatedSortedArray::findIndex([4, 5, 6, 7, 0, 1, 2], 0) => 4
 * SearchInRotatedSortedArray::findIndex([4, 5, 6, 7, 0, 1, 2], 3) => -1
 * SearchInRotatedSortedArray::findIndex([1], 0) => -1
 * SearchInRotatedSortedArray::findIndex([1], 1) => 0
 * SearchInRotatedSortedArray::findIndex([5, 1, 3], 5) => 0
 * SearchInRotatedSortedArray::findIndex([5, 1, 3], 3) => 2
 * SearchInRotatedSortedArray::findIndex([6, 7, 8, 1, 2, 3, 4, 5], 2) => 4
 */
final class SearchInRotatedSortedArray
{
    /**
     * @param int[] $nums
     */
    public static function findIndex(array $nums, int $target): int
    {
        if ($nums === []) {
            return -1;
        }

        $left = 0;
        $right = count($nums) - 1;

        while ($left <= $right) {
            $middle = $left + intdiv($right - $left, 2);

            if ($nums[$middle] === $target) {
                return $middle;
            }

            if ($nums[$left] <= $nums[$middle]) {
                if ($target >= $nums[$left] && $target < $nums[$middle]) {
                    $right = $middle - 1;
                } else {
                    $left = $middle + 1;
                }
            } else {
                if ($target > $nums[$middle] && $target <= $nums[$right]) {
                    $left = $middle + 1;
                } else {
                    $right = $middle - 1;
                }
            }
        }

        return -1;
    }
}
