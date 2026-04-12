<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\ReverseArray;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ReverseArrayTest extends TestCase
{
    #[DataProvider('reverseArrayCases')]
    public function test_it_reverses_an_array(array $items, array $expected): void
    {
        $this->assertSame(
            $expected,
            ReverseArray::reverse($items),
            'Failed for input: ' . json_encode($items)
        );
    }

    public static function reverseArrayCases(): array
    {
        return [
            'reverses integers' => [
                [1, 2, 3, 4],
                [4, 3, 2, 1],
            ],
            'reverses programming languages' => [
                ['php', 'java', 'python'],
                ['python', 'java', 'php'],
            ],
            'returns same array for single element' => [
                [7],
                [7],
            ],
            'returns empty array when input is empty' => [
                [],
                [],
            ],
            'reverses mixed numeric values' => [
                [10, -2, 0, 5],
                [5, 0, -2, 10],
            ],
        ];
    }
}

