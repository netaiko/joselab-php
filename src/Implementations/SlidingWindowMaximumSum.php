<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Find the maximum sum of any contiguous subarray of fixed size.
 *
 * Given an array of integers and a window size k, return the largest sum of
 * any contiguous subarray of size k.
 *
 * Solve it manually using the sliding window technique.
 * Do not recompute each window from scratch unless first practising the
 * brute-force version.
 *
 * Example:
 * Input: numbers = [2, 1, 5, 1, 3, 2], k = 3
 * Output: 9
 *
 * All Test Cases:
 * SlidingWindowMaximumSum::find([2, 1, 5, 1, 3, 2], 3) => 9
 * SlidingWindowMaximumSum::find([1, 2, 3, 4, 5], 2) => 9
 * SlidingWindowMaximumSum::find([5, 5, 5, 5], 1) => 5
 * SlidingWindowMaximumSum::find([4, -1, 2, 1], 2) => 3
 * SlidingWindowMaximumSum::find([], 3) => 0
 *
 * Complexity Variables:
 * n: number of elements in the array
 * k: size of the window
 */
final class SlidingWindowMaximumSum
{
    /**
     * Return the maximum sum of any contiguous subarray of the given size.
     *
     * @param int[] $numbers
     * @param int $windowSize
     * @return int
     */
    public static function find(array $numbers, int $windowSize): int
    {
        $size = count($numbers);

        if ($windowSize <= 0 || $windowSize > $size) {
            return 0;
        }

        $windowSum = 0;

        for ($i = 0; $i < $windowSize; $i++) {
            $windowSum += $numbers[$i];
        }

        $maxSum = $windowSum;

        for ($j = $windowSize; $j < $size; $j++) {
            $windowSum += $numbers[$j];
            $windowSum -= $numbers[$j - $windowSize];

            if ($windowSum > $maxSum) {
                $maxSum = $windowSum;
            }
        }

        return $maxSum;
    }
}
