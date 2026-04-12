<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\MergeTwoSortedArrays;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class MergeTwoSortedArraysTest extends TestCase
{
    #[DataProvider('mergeCases')]
    public function test_it_merges_two_sorted_arrays(array $left, array $right, array $expected): void
    {
        $this->assertSame(
            $expected,
            MergeTwoSortedArrays::merge($left, $right),
            'Failed for input: left=' . json_encode($left) . ', right=' . json_encode($right)
        );
    }

    public static function mergeCases(): array
    {
        return [
            'merges alternating values' => [
                [1, 3, 5],
                [2, 4, 6],
                [1, 2, 3, 4, 5, 6],
            ],
            'merges when right fits in the middle' => [
                [1, 2, 7],
                [3, 4, 5],
                [1, 2, 3, 4, 5, 7],
            ],
            'returns right array when left is empty' => [
                [],
                [1, 2, 3],
                [1, 2, 3],
            ],
            'returns left array when right is empty' => [
                [1, 2, 3],
                [],
                [1, 2, 3],
            ],
            'returns empty array when both arrays are empty' => [
                [],
                [],
                [],
            ],
            'merges arrays with duplicate values' => [
                [1, 2, 2, 5],
                [2, 3, 5, 6],
                [1, 2, 2, 2, 3, 5, 5, 6],
            ],
            'merges arrays with negative numbers' => [
                [-5, -2, 0],
                [-4, -1, 3],
                [-5, -4, -2, -1, 0, 3],
            ],
            'merges when all left values are smaller' => [
                [1, 2, 3],
                [4, 5, 6],
                [1, 2, 3, 4, 5, 6],
            ],
            'merges when all right values are smaller' => [
                [4, 5, 6],
                [1, 2, 3],
                [1, 2, 3, 4, 5, 6],
            ],
        ];
    }
}
