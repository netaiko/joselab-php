<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

final class ReverseString
{
    /**
     * Reverse a string.
     *
     * Return the characters in reverse order.
     *
     * @param string $input
     * @return string
     */
    public static function reverse(string $input): string
    {
        $output = '';
        $length = strlen($input);
        for ($i = $length - 1; $i >= 0; $i--) {
            $output .= $input[$i];
        }
        return $output;
    }
}
