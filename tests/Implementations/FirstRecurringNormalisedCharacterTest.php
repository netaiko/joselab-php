<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\FirstRecurringNormalisedCharacter;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class FirstRecurringNormalisedCharacterTest extends TestCase
{
    #[DataProvider('findCases')]
    public function test_it_finds_the_first_recurring_normalised_character(string $value, string $expected): void
    {
        $this->assertSame(
            $expected,
            FirstRecurringNormalisedCharacter::find($value),
            "Failed for value: {$value}"
        );
    }

    public static function findCases(): array
    {
        return [
            'ignores symbols and matches letters case-insensitively' => [
                'value' => 'A-b!c-a',
                'expected' => 'a',
            ],
            'finds recurring digit' => [
                'value' => '123@#31',
                'expected' => '3',
            ],
            'returns underscore when nothing repeats' => [
                'value' => 'abc',
                'expected' => '_',
            ],
            'finds first recurring character in swiss' => [
                'value' => 'Swiss',
                'expected' => 's',
            ],
            'finds recurring character after normalising case' => [
                'value' => 'abBA',
                'expected' => 'b',
            ],
            'matches same letter with different case' => [
                'value' => 'aA',
                'expected' => 'a',
            ],
            'ignores spaces and punctuation' => [
                'value' => 'a, b c a!',
                'expected' => 'a',
            ],
            'returns underscore for empty string' => [
                'value' => '',
                'expected' => '_',
            ],
            'returns underscore for only symbols' => [
                'value' => '!@#$%^&*()',
                'expected' => '_',
            ],
            'finds recurring numeric character with separators' => [
                'value' => '7-2-7',
                'expected' => '7',
            ],
        ];
    }
}
