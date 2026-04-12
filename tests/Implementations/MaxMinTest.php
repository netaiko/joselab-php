<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\MaxMin;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class MaxMinTest extends TestCase
{
    #[DataProvider('minMaxCases')]
    public function test_it_finds_min_max(array $value, array $expected): void
    {
        $this->assertSame(
            $expected,
            MaxMin::find($value),
            "Failed for value:" . implode(', ', $value)
        );
    }

    public static function minMaxCases(): array
    {
        return [
            'array of sorted numbers' => [[1, 2, 3, 4, 5, 6, 7, 8, 9, 10], ['min' => 1, 'max' => 10]],
            'array of numbers' => [[5, 2, 5, -1, -3, 0, 9, 8, 4, 2,], ['min' => -3, 'max' => 9]],
            'empty array' => [[], ['min' => null, 'max' => null]],
        ];
    }
}
