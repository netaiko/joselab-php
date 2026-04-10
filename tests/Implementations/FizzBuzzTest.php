<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\FizzBuzz;
use PHPUnit\Framework\TestCase;

final class FizzBuzzTest extends TestCase
{
    public function test_it_returns_the_expected_fizzbuzz_sequence(): void
    {
        $result = FizzBuzz::run(15);

        $this->assertSame([
            '1',
            '2',
            'Fizz',
            '4',
            'Buzz',
            'Fizz',
            '7',
            '8',
            'Fizz',
            'Buzz',
            '11',
            'Fizz',
            '13',
            '14',
            'FizzBuzz',
        ], $result);
    }

    public function test_it_returns_an_empty_array_when_limit_is_zero(): void
    {
        $result = FizzBuzz::run(0);

        $this->assertSame([], $result);
    }

    public function test_it_returns_an_empty_array_when_limit_is_negative(): void
    {
        $result = FizzBuzz::run(-5);

        $this->assertSame([], $result);
    }

    public function test_it_returns_only_one_when_limit_is_one(): void
    {
        $result = FizzBuzz::run(1);

        $this->assertSame(['1'], $result);
    }
}