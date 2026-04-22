<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\MissingNumber;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class MissingNumberTest extends TestCase
{
    #[DataProvider('findCases')]
    public function test_it_finds_the_missing_number(array $nums, int $expected): void
    {
        $this->assertSame(
            $expected,
            MissingNumber::find($nums),
            'Failed for input: [' . implode(', ', $nums) . ']'
        );
    }

    #[DataProvider('findCases')]
    public function test_it_finds_the_missing_number_with_math(array $nums, int $expected): void
    {
        $this->assertSame(
            $expected,
            MissingNumber::findWithMath($nums),
            'Failed for input: [' . implode(', ', $nums) . ']'
        );
    }

    public static function findCases(): array
    {
        return [
            'missing in middle' => [
                [0, 1, 2, 4, 5],
                3,
            ],
            'missing zero' => [
                [1, 2, 3, 4],
                0,
            ],
            'missing last number' => [
                [0, 1, 2, 3],
                4,
            ],
            'unsorted input' => [
                [3, 0, 1],
                2,
            ],
            'single element missing one' => [
                [0],
                1,
            ],
            'single element missing zero' => [
                [1],
                0,
            ],
            'larger example' => [
                [9, 6, 4, 2, 3, 5, 7, 0, 1],
                8,
            ],
        ];
    }
}
