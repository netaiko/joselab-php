<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\TwoSum;
use PHPUnit\Framework\TestCase;

final class TwoSumTest extends TestCase
{
    public function test_it_returns_the_indices_of_two_numbers_that_add_up_to_the_target(): void
    {
        $this->assertSame([0, 1], TwoSum::find([2, 7, 11, 15], 9));
    }

    public function test_it_returns_an_empty_array_when_no_pair_is_found(): void
    {
        $this->assertSame([], TwoSum::find([1, 2, 3, 4], 10));
    }

    public function test_it_returns_the_indices_when_the_pair_contains_duplicate_values(): void
    {
        $this->assertSame([0, 1], TwoSum::find([3, 3], 6));
    }
}
