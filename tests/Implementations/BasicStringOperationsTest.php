<?php


declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\BasicStringOperations;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class BasicStringOperationsTest extends TestCase
{
    #[DataProvider('analyseCases')]
    public function test_it_analyses_basic_string_operations(string $value, array $expected): void
    {
        $this->assertSame(
            $expected,
            BasicStringOperations::analyse($value),
            "Failed for value: {$value}"
        );
    }

    public static function analyseCases(): array
    {
        return [
            'hello world' => [
                'Hello World',
                [
                    'characters' => 11,
                    'vowels' => 3,
                    'numbers' => 0,
                    'consonants' => 7,
                    'spaces' => 1,
                    'symbols' => 0,
                    'words' => 2,
                ],
            ],
            'string with number' => [
                'PHP 8',
                [
                    'characters' => 5,
                    'vowels' => 0,
                    'numbers' => 1,
                    'consonants' => 3,
                    'spaces' => 1,
                    'symbols' => 0,
                    'words' => 2,
                ],
            ],
            'vowels separated by spaces' => [
                'a e i o u',
                [
                    'characters' => 9,
                    'vowels' => 5,
                    'numbers' => 0,
                    'consonants' => 0,
                    'spaces' => 4,
                    'symbols' => 0,
                    'words' => 5,
                ],
            ],
            'empty string' => [
                '',
                [
                    'characters' => 0,
                    'vowels' => 0,
                    'numbers' => 0,
                    'consonants' => 0,
                    'spaces' => 0,
                    'symbols' => 0,
                    'words' => 0,
                ],
            ],
            'letters numbers spaces and symbol' => [
                'Code 123!',
                [
                    'characters' => 9,
                    'vowels' => 2,
                    'numbers' => 3,
                    'consonants' => 2,
                    'spaces' => 1,
                    'symbols' => 1,
                    'words' => 2,
                ],
            ],
            'multiple spaces between words' => [
                'hello   world',
                [
                    'characters' => 13,
                    'vowels' => 3,
                    'numbers' => 0,
                    'consonants' => 7,
                    'spaces' => 3,
                    'symbols' => 0,
                    'words' => 2,
                ],
            ],
        ];
    }
}
