<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\SlidingWindowMaximumSum;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class SlidingWindowMaximumSumTest extends TestCase
{
    #[DataProvider('slidingWindowMaximumSumCases')]
    public function test_it_finds_the_maximum_sum_of_a_fixed_size_contiguous_subarray(
        array $numbers,
        int   $windowSize,
        int   $expected
    ): void
    {
        $this->assertSame(
            $expected,
            SlidingWindowMaximumSum::find($numbers, $windowSize),
            'Failed for input: ' . json_encode([
                'numbers' => $numbers,
                'windowSize' => $windowSize,
            ])
        );
    }

    public static function slidingWindowMaximumSumCases(): array
    {
        return [
            'finds maximum sum in basic example' => [[2, 1, 5, 1, 3, 2], 3, 9],
            'finds maximum sum in increasing numbers' => [[1, 2, 3, 4, 5], 2, 9],
            'returns maximum value when window size is one' => [[5, 5, 5, 5], 1, 5],
            'handles negative values inside the window' => [[4, -1, 2, 1], 2, 3],
            'returns zero for empty array' => [[], 3, 0],
            'finds maximum sum when all values are negative' => [[-5, -2, -8], 2, -7],
            'finds maximum sum when all values are negative in another case' => [[-4, -1, -3], 2, -4],
            'returns the value when the array has one negative element' => [[-6], 1, -6],
            'finds maximum sum when the best result is still negative' => [[-10, -3, -7, -2], 2, -9],
        ];
    }
}
