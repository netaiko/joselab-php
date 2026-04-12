<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\FirstNonRepeatingCharacter;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class FirstNonRepeatingCharacterTest extends TestCase
{
    #[DataProvider('firstNonRepeatingCharacterCases')]
    public function test_it_finds_the_first_non_repeating_character(string $value, ?string $expected): void
    {
        $this->assertSame(
            $expected,
            FirstNonRepeatingCharacter::find($value),
            "Failed for value: {$value}"
        );
    }

    public static function firstNonRepeatingCharacterCases(): array
    {
        return [
            'returns first unique character in swiss' => ['swiss', 'w'],
            'returns d when only d does not repeat' => ['aabbccd', 'd'],
            'returns null when all characters repeat' => ['aabbcc', null],
            'returns x for single character string' => ['x', 'x'],
            'returns c when unique character is in the middle' => ['aabbcddee', 'c'],
            'returns x when unique character appears later' => ['aabbcddeexc', 'x'],
            'returns null for empty string' => ['', null],
        ];
    }
}
