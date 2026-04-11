<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\RemoveDuplicates;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class RemoveDuplicatesTest extends TestCase
{
    #[DataProvider('removeDuplicateCases')]
    public function test_it_removes_duplicate_values(array $items, array $expected): void
    {
        $this->assertSame(
            $expected,
            RemoveDuplicates::removeDuplicates($items),
            'Failed for items: [' . implode(', ', $items) . '].'
        );
    }

    public static function removeDuplicateCases(): array
    {
        return [
            'integers with duplicates' => [[1, 2, 2, 3, 1], [1, 2, 3]],
            'strings with duplicates' => [['java', 'php', 'java'], ['java', 'php']],
            'already unique values' => [[1, 2, 3], [1, 2, 3]],
            'all values duplicated' => [[5, 5, 5, 5], [5]],
            'empty array' => [[], []],
            'single value' => [['php'], ['php']],
            'mixed repeated strings' => [['laravel', 'vue', 'php', 'vue', 'laravel'], ['laravel', 'vue', 'php']],
        ];
    }
}
