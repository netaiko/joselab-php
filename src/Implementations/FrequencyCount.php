<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

final class FrequencyCount
{
    /**
     * Count the frequency of each element in an array.
     *
     * Return a map where keys are values from the array and values are counts.
     *
     * @param array $items
     * @return array
     */
    public static function count(array $items): array
    {
        $frequencies = [];

        foreach ($items as $item) {
            $key = (string)$item;
            $frequencies[$key] = ($frequencies[$key] ?? 0) + 1;
        }

        return $frequencies;
    }
}
