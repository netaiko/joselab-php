<?php

declare(strict_types=1);

namespace JoseLab\Php\Tests\Implementations;

use JoseLab\Php\Implementations\ShoppingDepartments;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class ShoppingDepartmentsTest extends TestCase
{
    #[DataProvider('shoppingCases')]
    public function test_it_calculates_saved_department_visits(
        array $products,
        array $shoppingList,
        int   $expected
    ): void
    {
        $this->assertSame(
            $expected,
            ShoppingDepartments::calculateSavedVisits($products, $shoppingList),
            'Failed for shopping list: [' . implode(', ', $shoppingList) . '].'
        );
    }

    #[DataProvider('groupedShoppingCases')]
    public function test_it_sorts_shopping_list_by_department(
        array $products,
        array $shoppingList,
        array $expected
    ): void
    {
        $productsByDepartments = ShoppingDepartments::getProductsByDepartments($products);

        $this->assertSame(
            $expected,
            ShoppingDepartments::sortListByDepartment($shoppingList, $productsByDepartments),
            'Failed for shopping list: [' . implode(', ', $shoppingList) . '].'
        );
    }

    #[DataProvider('printCases')]
    public function test_it_prints_products_by_department(array $groupedProducts, string $expected): void
    {
        $this->assertSame(
            $expected,
            ShoppingDepartments::printProductsByDepartment($groupedProducts)
        );
    }

    public static function shoppingCases(): array
    {
        $products = self::products();

        return [
            'list 1 saves two visits' => [
                $products,
                ['Blueberries', 'Milk', 'Coffee', 'Flour', 'Cheese', 'Carrots'],
                2,
            ],
            'list 2 saves two visits' => [
                $products,
                ['Blueberries', 'Carrots', 'Coffee', 'Milk', 'Flour', 'Cheese'],
                2,
            ],
            'list 3 saves zero visits' => [
                $products,
                ['Blueberries', 'Carrots', 'Romaine Lettuce', 'Iceberg Lettuce'],
                0,
            ],
            'list 4 saves two visits' => [
                $products,
                ['Milk', 'Flour', 'Chocolate Milk', 'Pasta Sauce'],
                2,
            ],
            'list 5 saves zero visits' => [
                $products,
                ['Cheese', 'Potatoes', 'Blueberries', 'Canned Tuna'],
                0,
            ],
        ];
    }

    public static function groupedShoppingCases(): array
    {
        $products = self::products();

        return [
            'list 1 grouped by department' => [
                $products,
                ['Blueberries', 'Milk', 'Coffee', 'Flour', 'Cheese', 'Carrots'],
                [
                    'Produce' => ['Blueberries', 'Carrots'],
                    'Dairy' => ['Milk', 'Cheese'],
                    'Pantry' => ['Coffee', 'Flour'],
                ],
            ],
            'list 4 grouped by department' => [
                $products,
                ['Milk', 'Flour', 'Chocolate Milk', 'Pasta Sauce'],
                [
                    'Dairy' => ['Milk', 'Chocolate Milk'],
                    'Pantry' => ['Flour', 'Pasta Sauce'],
                ],
            ],
        ];
    }

    public static function printCases(): array
    {
        return [
            'prints grouped departments' => [
                [
                    'Produce' => ['Blueberries', 'Carrots'],
                    'Pantry' => ['Coffee', 'Flour'],
                    'Dairy' => ['Milk', 'Cheese'],
                ],
                'Produce(Blueberries/Carrots)->Pantry(Coffee/Flour)->Dairy(Milk/Cheese) = 3 department visits',
            ],
        ];
    }

    /**
     * @return array<int, array{0: string, 1: string}>
     */
    private static function products(): array
    {
        return [
            ['Cheese', 'Dairy'],
            ['Carrots', 'Produce'],
            ['Potatoes', 'Produce'],
            ['Canned Tuna', 'Pantry'],
            ['Romaine Lettuce', 'Produce'],
            ['Chocolate Milk', 'Dairy'],
            ['Flour', 'Pantry'],
            ['Iceberg Lettuce', 'Produce'],
            ['Coffee', 'Pantry'],
            ['Pasta', 'Pantry'],
            ['Milk', 'Dairy'],
            ['Blueberries', 'Produce'],
            ['Pasta Sauce', 'Pantry'],
        ];
    }
}