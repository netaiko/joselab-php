<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

final class FizzBuzz
{
    /**
     * Generate a FizzBuzz sequence from 1 to the given limit.
     *
     * Multiples of 3 are replaced with "Fizz", multiples of 5 with "Buzz",
     * and multiples of both 3 and 5 with "FizzBuzz".
     *
     * @param int $limit
     * @return string[]
     */
    public static function run(int $limit): array
    {
        $result = [];

        for ($i = 1; $i <= $limit; $i++) {
            if ($i % 15 === 0) {
                $result[] = 'FizzBuzz';
            } elseif ($i % 3 === 0) {
                $result[] = 'Fizz';
            } elseif ($i % 5 === 0) {
                $result[] = 'Buzz';
            } else {
                $result[] = (string)$i;
            }
        }

        return $result;
    }
}
