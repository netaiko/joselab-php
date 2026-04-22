<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\SearchInRotatedSortedArray;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class SearchInRotatedSortedArrayTest extends TestCase
{
    #[DataProvider('findIndexCases')]
    public function test_it_finds_the_index_of_the_target_in_a_rotated_sorted_array(
        array $nums,
        int   $target,
        int   $expected
    ): void
    {
        $this->assertSame(
            $expected,
            SearchInRotatedSortedArray::findIndex($nums, $target),
            'Failed for nums: ' . json_encode($nums) . ' and target: ' . $target
        );
    }

    public static function findIndexCases(): array
    {
        return [
            'finds target in rotated array' => [
                'nums' => [4, 5, 6, 7, 0, 1, 2],
                'target' => 0,
                'expected' => 4,
            ],
            'returns minus one when target does not exist' => [
                'nums' => [4, 5, 6, 7, 0, 1, 2],
                'target' => 3,
                'expected' => -1,
            ],
            'returns minus one for single element not matching target' => [
                'nums' => [1],
                'target' => 0,
                'expected' => -1,
            ],
            'finds target in single element array' => [
                'nums' => [1],
                'target' => 1,
                'expected' => 0,
            ],
            'finds target at first position in short rotated array' => [
                'nums' => [5, 1, 3],
                'target' => 5,
                'expected' => 0,
            ],
            'finds target at last position in short rotated array' => [
                'nums' => [5, 1, 3],
                'target' => 3,
                'expected' => 2,
            ],
            'finds target in larger rotated array' => [
                'nums' => [6, 7, 8, 1, 2, 3, 4, 5],
                'target' => 2,
                'expected' => 4,
            ],
            'finds first element in non rotated array' => [
                'nums' => [1, 2, 3, 4, 5, 6],
                'target' => 1,
                'expected' => 0,
            ],
            'finds last element in non rotated array' => [
                'nums' => [1, 2, 3, 4, 5, 6],
                'target' => 6,
                'expected' => 5,
            ],
            'finds pivot element in rotated array' => [
                'nums' => [30, 40, 50, 5, 10, 20],
                'target' => 5,
                'expected' => 3,
            ],
            'returns minus one when target is smaller than all values' => [
                'nums' => [30, 40, 50, 5, 10, 20],
                'target' => 1,
                'expected' => -1,
            ],
            'returns minus one when target is larger than all values' => [
                'nums' => [30, 40, 50, 5, 10, 20],
                'target' => 60,
                'expected' => -1,
            ],
        ];
    }
}
