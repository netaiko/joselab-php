<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\FrequencyCount;
use PHPUnit\Framework\TestCase;

final class FrequencyCountTest extends TestCase
{
    public function test_it_returns_the_frequency_of_each_element(): void
    {
        $result = FrequencyCount::count([
            'php',
            'java',
            'php',
            'python',
            'java',
            'php',
        ]);

        $this->assertSame([
            'php' => 3,
            'java' => 2,
            'python' => 1,
        ], $result);
    }

    public function test_it_returns_an_empty_array_when_items_are_empty(): void
    {
        $result = FrequencyCount::count([]);

        $this->assertSame([], $result);
    }

    public function test_it_returns_one_for_each_element_when_all_items_are_unique(): void
    {
        $result = FrequencyCount::count([
            'php',
            'java',
            'python',
        ]);

        $this->assertSame([
            'php' => 1,
            'java' => 1,
            'python' => 1,
        ], $result);
    }

    public function test_it_counts_numeric_values_as_string_keys(): void
    {
        $result = FrequencyCount::count([8, 17, 8, 21, 17, 8]);

        $this->assertSame([
            '8' => 3,
            '17' => 2,
            '21' => 1,
        ], $result);
    }
}
