<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\MinimumSizeSubarraySum;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class MinimumSizeSubarraySumTest extends TestCase
{
    #[DataProvider('minimumSizeSubarraySumCases')]
    public function test_it_returns_the_length_of_the_shortest_contiguous_subarray_with_sum_at_least_target(
        int $target,
        array $numbers,
        int $expected
    ): void {
        $this->assertSame(
            $expected,
            MinimumSizeSubarraySum::findLength($target, $numbers),
            'Failed for input: ' . json_encode([
                'target' => $target,
                'numbers' => $numbers,
            ])
        );
    }

    public static function minimumSizeSubarraySumCases(): array
    {
        return [
            'returns 2 for classic example' => [7, [2, 3, 1, 2, 4, 3], 2],
            'returns 1 when one element already meets target' => [4, [1, 4, 4], 1],
            'returns 3 for target 11' => [11, [1, 2, 3, 4, 5], 3],
            'returns 5 when whole array is needed' => [15, [1, 2, 3, 4, 5], 5],
            'returns 0 when target cannot be reached' => [100, [1, 2, 3, 4, 5], 0],
            'returns 0 for empty array' => [3, [], 0],
            'returns 1 for single matching element' => [5, [5], 1],
            'returns 0 for single non-matching element' => [6, [5], 0],
            'returns 2 when shortest subarray is in the middle' => [8, [1, 2, 5, 2, 1], 3],
            'returns 4 when shrinking window finds the best answer' => [8, [3, 1, 1, 1, 2, 4], 4],
        ];
    }
}
