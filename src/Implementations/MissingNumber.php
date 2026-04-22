<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Find the missing number in an array of distinct integers.
 *
 * You are given an array of integers of length n containing distinct numbers
 * taken from the range 0 to n, with exactly one number missing.
 *
 * Return the missing number.
 *
 * Solve it in O(n) time.
 * Do not sort the array.
 *
 * Example:
 * Input: [0, 1, 2, 4, 5]
 * Output: 3
 *
 * All Test Cases:
 * MissingNumber::find([0, 1, 2, 4, 5]) => 3
 * MissingNumber::find([1, 2, 3, 4]) => 0
 * MissingNumber::find([0, 1, 2, 3]) => 4
 * MissingNumber::find([3, 0, 1]) => 2
 * MissingNumber::find([0]) => 1
 * MissingNumber::find([1]) => 0
 * MissingNumber::find([9, 6, 4, 2, 3, 5, 7, 0, 1]) => 8
 */
final class MissingNumber
{
    /**
     * Find the missing number by building the full range and removing
     * the numbers that already exist in the input array.
     *
     * @param int[] $nums
     */
    public static function find(array $nums): int
    {
        $size = count($nums);
        $fullArray = self::initFullArray($size);

        foreach ($nums as $num) {
            unset($fullArray[$num]);
        }

        return array_key_first($fullArray) ?? 0;
    }

    /**
     * Find the missing number using the sum formula:
     * n * (n + 1) / 2.
     *
     * @param int[] $nums
     */
    public static function findWithMath(array $nums): int
    {
        $n = count($nums);
        $expectedSum = (int) (($n * ($n + 1)) / 2);
        $actualSum = 0;

        foreach ($nums as $num) {
            $actualSum += $num;
        }

        return $expectedSum - $actualSum;
    }

    private static function initFullArray(int $n): array
    {
        $fullArray = [];
        for ($i = 0; $i <= $n; $i++) {
            $fullArray[$i] = true;
        }
        return $fullArray;
    }
}
