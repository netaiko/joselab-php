<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\BestTimeToBuyAndSellStock;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class BestTimeToBuyAndSellStockTest extends TestCase
{
    #[DataProvider('bestTimeToBuyAndSellStockCases')]
    public function test_it_returns_the_maximum_profit_from_one_buy_and_one_sell(
        array $prices,
        int $expected
    ): void {
        $this->assertSame(
            $expected,
            BestTimeToBuyAndSellStock::maxProfit($prices),
            'Failed for input: ' . json_encode([
                'prices' => $prices,
            ])
        );
    }

    public static function bestTimeToBuyAndSellStockCases(): array
    {
        return [
            'returns maximum profit for typical case' => [[7, 1, 5, 3, 6, 4], 5],
            'returns zero when prices only decrease' => [[7, 6, 4, 3, 1], 0],
            'returns profit for short array with gain' => [[2, 4, 1], 2],
            'returns zero for single price' => [[1], 0],
            'returns zero for empty array' => [[], 0],
            'returns zero when all prices are equal' => [[3, 3, 3, 3], 0],
            'returns best profit when minimum price appears near the end' => [[9, 8, 7, 2, 10], 8],
            'returns best profit when buy is first day and sell is last day' => [[1, 2, 3, 4, 5], 4],
            'returns zero when no later price is higher than minimum' => [[5, 4, 3, 2, 1], 0],
            'returns correct profit when best sell is not the final element' => [[4, 2, 8, 1, 6], 6],
            'returns correct profit when a new minimum is found before later profit' => [[5, 3, 6], 3],
            'returns correct profit when minimum price is updated multiple times' => [[9, 7, 5, 8, 3, 10], 7],
        ];
    }
}
