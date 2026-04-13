<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * Find the maximum profit from a single buy and a single sell of stock.
 *
 * Given an array where each value represents the stock price on a given day,
 * return the maximum profit possible by buying once and selling once later.
 * If no profit is possible, return 0.
 *
 * Solve it manually by tracking the minimum price seen so far and the best profit.
 * Do not use built-in helpers that solve the problem directly.
 *
 * Example:
 * Input: [7, 1, 5, 3, 6, 4]
 * Output: 5
 *
 * All Test Cases:
 * BestTimeToBuyAndSellStock::maxProfit([7, 1, 5, 3, 6, 4]) => 5
 * BestTimeToBuyAndSellStock::maxProfit([7, 6, 4, 3, 1]) => 0
 * BestTimeToBuyAndSellStock::maxProfit([2, 4, 1]) => 2
 * BestTimeToBuyAndSellStock::maxProfit([1]) => 0
 * BestTimeToBuyAndSellStock::maxProfit([]) => 0
 *
 * Complexity Variables:
 * n: number of elements in the array
 */
final class BestTimeToBuyAndSellStock
{
    /**
     * Return the maximum profit from one buy and one later sell.
     *
     * @param int[] $prices
     * @return int
     */
    public static function maxProfit(array $prices): int
    {
        $size = count($prices);

        if ($size < 2) {
            return 0;
        }

        $bestProfit = 0;
        $minPrice = $prices[0];

        for ($i = 1; $i < $size; $i++) {
            $currentPrice = $prices[$i];

            if ($currentPrice < $minPrice) {
                $minPrice = $currentPrice;
                continue;
            }

            $currentProfit = $currentPrice - $minPrice;

            if ($currentProfit > $bestProfit) {
                $bestProfit = $currentProfit;
            }
        }

        return $bestProfit;
    }
}
