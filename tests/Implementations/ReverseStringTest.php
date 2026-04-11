<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\ReverseString;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ReverseStringTest extends TestCase
{
    #[DataProvider('reverseStringCases')]
    public function test_it_reverses_a_string(string $value, string $expected): void
    {
        $this->assertSame(
            $expected,
            ReverseString::reverse($value),
            "Failed for value: \"$value\"."
        );
    }

    public static function reverseStringCases(): array
    {
        return [
            'desserts to stressed' => ['desserts', 'stressed'],
            'live to evil' => ['live', 'evil'],
            'drawer to reward' => ['drawer', 'reward'],
            'stun to nuts' => ['stun', 'nuts'],
            'loop to pool' => ['loop', 'pool'],
            'part to trap' => ['part', 'trap'],
            'with spaces' => ['race car', 'rac ecar'],
            'numeric string' => ['12345', '54321'],
            'special characters' => ['php-8!', '!8-php'],
        ];
    }
}
