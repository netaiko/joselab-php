<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use JoseLab\Php\Implementations\FizzBuzz;
use JoseLab\Php\Implementations\FrequencyCount;
use JoseLab\Php\Implementations\Palindrome;
use JoseLab\Php\Implementations\TwoSum;

function title(string $text): void
{
    echo PHP_EOL . '=== ' . $text . ' ===' . PHP_EOL;
}

function line(string $label, mixed $value): void
{
    echo $label . ': ';
    print_r($value);
    echo PHP_EOL;
}

title('FizzBuzz');
$limit = 20;
line('Input', ['limit' => $limit]);
line('Output', FizzBuzz::run($limit));

title('Two Sum');
$numbers = [2, 7, 11, 15];
$target = 9;
line('Input', ['numbers' => $numbers, 'target' => $target]);
line('Output', TwoSum::find($numbers, $target));

title('Palindrome');
$value = 'level';
line('Input', ['value' => $value]);
line('Output', Palindrome::isPalindrome($value));

title('Frequency Count');
$items = ['php', 'java', 'php', 'python', 'java', 'php'];
line('Input', ['items' => $items]);
line('Output', FrequencyCount::count($items));