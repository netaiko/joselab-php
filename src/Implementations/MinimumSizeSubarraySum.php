<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Find the smallest length of a contiguous subarray whose sum is
 * greater than or equal to a target value.
 *
 * Given an array of positive integers and a target integer,
 * return the length of the shortest contiguous subarray whose sum
 * is greater than or equal to the target.
 *
 * If no such subarray exists, return 0.
 *
 * Solve it manually using a sliding window approach.
 * Do not use built-in helpers that hide the main logic.
 *
 * Example:
 * Input: target = 7, numbers = [2, 3, 1, 2, 4, 3]
 * Output: 2
 * Explanation:
 * The shortest valid subarray is [4, 3], whose sum is 7.
 *
 * All Test Cases:
 * MinimumSizeSubarraySum::findLength(7, [2, 3, 1, 2, 4, 3]) => 2
 * MinimumSizeSubarraySum::findLength(4, [1, 4, 4]) => 1
 * MinimumSizeSubarraySum::findLength(11, [1, 2, 3, 4, 5]) => 3
 * MinimumSizeSubarraySum::findLength(15, [1, 2, 3, 4, 5]) => 5
 * MinimumSizeSubarraySum::findLength(100, [1, 2, 3, 4, 5]) => 0
 * MinimumSizeSubarraySum::findLength(3, []) => 0
 *
 * Complexity Variables:
 * n: number of elements in the array
 */
final class MinimumSizeSubarraySum
{
    /**
     * Return the length of the shortest contiguous subarray
     * whose sum is greater than or equal to the target.
     *
     * @param int $target
     * @param int[] $numbers
     * @return int
     */
    public static function findLength(int $target, array $numbers): int
    {
        $size = count($numbers);

        if ($size === 0) {
            return 0;
        }

        $sum = 0;
        $bestSize = $size + 1;

        $left = 0;
        for ($right = 0; $right < $size; $right++) {
            $sum += $numbers[$right];

            while ($sum >= $target) {
                $currentSize = $right - $left + 1;
                if ($currentSize < $bestSize) {
                    $bestSize = $currentSize;
                }

                $sum -= $numbers[$left];
                $left++;
            }
        }

        if ($bestSize === $size + 1) {
            return 0;
        }
        return $bestSize;
    }
}
