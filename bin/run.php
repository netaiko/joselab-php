<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use JoseLab\Php\Implementations\FizzBuzz; 

function title(string $text): void
{
    echo PHP_EOL . '=== ' . $text . ' ===' . PHP_EOL;
}

function output(mixed $value): void
{
    print_r($value);
    echo PHP_EOL;
}

title('FizzBuzz');
output(FizzBuzz::run(20));

