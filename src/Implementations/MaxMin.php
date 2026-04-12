<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Find the maximum and minimum values in an array of integers.
 *
 * Given an array of integers, return both the largest and the smallest value.
 *
 * Solve it manually by iterating through the array and comparing values.
 * Do not use built-in helpers such as max() or min().
 *
 * Example:
 * Input: [7, 2, 9, 4, 1]
 * Output: ['max' => 9, 'min' => 1]
 *
 * All Test Cases:
 * MaxMin::find([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]) => ['min' => 1, 'max' => 10]
 * MaxMin::find([5, 2, 5, -1, -3, 0, 9, 8, 4, 2]) => ['min' => -3, 'max' => 9]
 * MaxMin::find([]) => ['min' => null, 'max' => null]
 *
 * Complexity Variable:
 * n: number of elements in the array
 */
final class MaxMin
{
    /**
     * Return the minimum and maximum values from the given array.
     *
     * @param int[] $numbers
     * @return array{max:int|null, min:int|null}
     */
    public static function find(array $numbers): array
    {

        if ($numbers === []) {
            return [
                'min' => null,
                'max' => null,
            ];
        }

        $min = $numbers[0];
        $max = $numbers[0];

        foreach ($numbers as $i => $number) {
            if ($i === 0) {
                continue;
            }

            if ($number < $min) {
                $min = $number;
            }

            if ($number > $max) {
                $max = $number;
            }
        }

        return [
            'min' => $min,
            'max' => $max,
        ];
    }
}
