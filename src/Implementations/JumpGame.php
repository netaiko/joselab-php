<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Determine whether it is possible to reach the end of the array.
 *
 * Given an array of non-negative integers, each value represents the maximum number
 * of steps you may jump forward from that index.
 *
 * Starting at index 0, return true if you can reach the last index or go beyond it.
 * Return false if you get stuck before reaching the end.
 *
 * You may choose any jump length from 1 up to the value at the current index.
 *
 * Solve it manually using a greedy approach.
 * Do not use built-in helpers that hide the main logic.
 *
 * Example:
 * Input: [2, 3, 1, 1, 4]
 * Output: true
 * Explanation:
 * Start at index 0. From there, you may jump 1 or 2 steps.
 * One valid path is:
 * index 0 -> index 1 -> index 4
 *
 * Input: [3, 2, 1, 0, 4]
 * Output: false
 * Explanation:
 * You can reach index 3, but from there the jump length is 0,
 * so you cannot move forward to the last index.
 *
 * All Test Cases:
 * JumpGame::canJump([2, 3, 1, 1, 4]) => true
 * JumpGame::canJump([3, 2, 1, 0, 4]) => false
 * JumpGame::canJump([0]) => true
 * JumpGame::canJump([2, 0, 0]) => true
 * JumpGame::canJump([1, 0, 1, 0]) => false
 *
 * Complexity Variables:
 * n: number of elements in the array
 */
final class JumpGame
{
    /**
     * Return true when the last index can be reached.
     *
     * @param int[] $steps
     * @return bool
     */
    public static function canJump(array $steps): bool
    {
        $size = count($steps);

        if ($size === 0) {
            return false;
        }

        $furthestReach = 0;

        for ($i = 0; $i < $size; $i++) {
            if ($i > $furthestReach) {
                return false;
            }

            $currentReach = $i + $steps[$i];

            if ($currentReach > $furthestReach) {
                $furthestReach = $currentReach;
            }

            if ($furthestReach >= $size - 1) {
                return true;
            }
        }

        return true;
    }
}

