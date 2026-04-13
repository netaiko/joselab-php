<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\ValidParentheses;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ValidParenthesesTest extends TestCase
{
    #[DataProvider('validParenthesesCases')]
    public function test_it_checks_whether_parentheses_are_valid(
        string $value,
        bool $expected
    ): void {
        $this->assertSame(
            $expected,
            ValidParentheses::isValid($value),
            'Failed for input: ' . json_encode([
                'value' => $value,
            ])
        );
    }

    public static function validParenthesesCases(): array
    {
        return [
            'returns true for simple valid pairs' => ['()[]{}', true],
            'returns true for nested valid pairs' => ['([{}])', true],
            'returns false for mismatched pairs' => ['(]', false],
            'returns false for incorrect nesting' => ['([)]', false],
            'returns true for empty string' => ['', true],
            'returns true for one valid pair' => ['()', true],
            'returns true for multiple same pairs' => ['((()))', true],
            'returns false for closing bracket first' => [')(', false],
            'returns false for missing closing bracket' => ['(()', false],
            'returns false for missing opening bracket' => ['())', false],
        ];
    }
}