<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use JoseLab\Php\Implementations\BasicStringOperations;
use JoseLab\Php\Implementations\FirstNonRepeatingCharacter;
use JoseLab\Php\Implementations\FizzBuzz;
use JoseLab\Php\Implementations\FrequencyCount;
use JoseLab\Php\Implementations\MaxMin;
use JoseLab\Php\Implementations\MergeTwoSortedArrays;
use JoseLab\Php\Implementations\Palindrome;
use JoseLab\Php\Implementations\RemoveDuplicates;
use JoseLab\Php\Implementations\ReverseArray;
use JoseLab\Php\Implementations\ReverseString;
use JoseLab\Php\Implementations\SlidingWindowMaximumSum;
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

title('Reverse String');
$value = 'stressed';
line('Input', ['value' => $value]);
line('Output', ReverseString::reverse($value));

title('Reverse Array');
$items = [1, 2, 3, 4];
line('Input', ['items' => $items]);
line('Output', ReverseArray::reverse($items));

title('Merge Two Sorted Arrays');
$left = [1, 3, 5];
$right = [2, 4, 6];
line('Input', ['left' => $left, 'right' => $right]);
line('Output', MergeTwoSortedArrays::merge($left, $right));

title('Remove Duplicates');
$items = ['java', 'php', 'java', 'python', 'php', 'go'];
line('Input', ['items' => $items]);
line('Output', RemoveDuplicates::removeDuplicates($items));

title('Max Min');
$numbers = [5, 2, 5, -1, -3, 0, 9, 8, 4, 2];
line('Input', ['numbers' => $numbers]);
line('Output', MaxMin::find($numbers));

title('Sliding Window Maximum Sum');
$numbers = [2, 1, 5, 1, 3, 2];
$windowSize = 3;
line('Input', ['numbers' => $numbers, 'windowSize' => $windowSize]);
line('Output', SlidingWindowMaximumSum::find($numbers, $windowSize));

title('Basic String Operations');
$text = 'Hello World 123!';
line('Input', ['text' => $text]);
line('Output', BasicStringOperations::analyse($text));

title('First Non-Repeating Character');
$value = 'swiss';
line('Input', ['value' => $value]);
line('Output', FirstNonRepeatingCharacter::find($value));
