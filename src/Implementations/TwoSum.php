<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

final class TwoSum
{
    /**
     * Find the indices of two numbers in the array whose sum equals the target.
     *
     * Uses a hash map to store previously seen numbers and their indices.
     * For each element, it calculates the complement (target - current value)
     * and checks whether it has already been seen.
     *
     * Example:
     * Input: numbers = [2, 7, 11, 15], target = 9
     * Output: [0, 1]
     *
     * @param int[] $numbers List of integers
     * @param int $target Target sum
     * @return int[] Indices of the two numbers that add up to the target, or empty array if not found
     */
    public static function find(array $numbers, int $target): array
    {
        $seen = [];

        foreach ($numbers as $index => $number) {
            $complement = $target - $number;

            if (isset($seen[$complement])) {
                return [$seen[$complement], $index];
            }

            $seen[$number] = $index;
        }

        return [];
    }
}
