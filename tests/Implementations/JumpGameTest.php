<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\JumpGame;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class JumpGameTest extends TestCase
{
    #[DataProvider('jumpGameCases')]
    public function test_it_checks_whether_the_last_index_can_be_reached(
        array $steps,
        bool $expected
    ): void {
        $this->assertSame(
            $expected,
            JumpGame::canJump($steps),
            'Failed for input: ' . json_encode([
                'steps' => $steps,
            ])
        );
    }

    public static function jumpGameCases(): array
    {
        return [
            'returns true for classic reachable case' => [[2, 3, 1, 1, 4], true],
            'returns false for classic blocked case' => [[3, 2, 1, 0, 4], false],
            'returns true for single zero' => [[0], true],
            'returns true when first jump reaches the end' => [[2, 0, 0], true],
            'returns false when zero blocks progress before the end' => [[1, 0, 1, 0], false],
            'returns true for all ones' => [[1, 1, 1, 1], true],
            'returns false for empty array' => [[], false],
            'returns true when jump can skip over zero' => [[2, 0, 1], true],
            'returns true when large first jump reaches beyond the end' => [[5, 0, 0, 0], true],
            'returns false when first value is zero and array has more than one element' => [[0, 2], false],
        ];
    }
}