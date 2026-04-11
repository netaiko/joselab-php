<?php

declare(strict_types=1);

namespace JoseLab\Php\Implementations;

/**
 * You are going on a camping trip, but before you leave, you need to buy groceries. To optimise
 * your time spent in the store, instead of buying the items from your shopping list in order,
 * you plan to buy everything you need from one department before moving to the next.
 *
 * Given an unsorted list of products with their departments and a shopping list, return the time
 * saved in terms of the number of department visits eliminated.
 *
 * Example:
 * products = [
 *     ['Cheese',          'Dairy'],
 *     ['Carrots',         'Produce'],
 *     ['Potatoes',        'Produce'],
 *     ['Canned Tuna',     'Pantry'],
 *     ['Romaine Lettuce', 'Produce'],
 *     ['Chocolate Milk',  'Dairy'],
 *     ['Flour',           'Pantry'],
 *     ['Iceberg Lettuce', 'Produce'],
 *     ['Coffee',          'Pantry'],
 *     ['Pasta',           'Pantry'],
 *     ['Milk',            'Dairy'],
 *     ['Blueberries',     'Produce'],
 *     ['Pasta Sauce',     'Pantry'],
 * ]
 *
 * list1 = ['Blueberries', 'Milk', 'Coffee', 'Flour', 'Cheese', 'Carrots']
 *
 * For example, buying the items from list1 in order would take 5 department visits, whereas your
 * method would lead to only visiting 3 departments, a difference of 2 departments.
 *
 * Produce(Blueberries)->Dairy(Milk)->Pantry(Coffee/Flour)->Dairy(Cheese)->Produce(Carrots) = 5 department visits
 * New: Produce(Blueberries/Carrots)->Pantry(Coffee/Flour)->Dairy(Milk/Cheese) = 3 department visits
 *
 * list2 = ['Blueberries', 'Carrots', 'Coffee', 'Milk', 'Flour', 'Cheese'] => 2
 * list3 = ['Blueberries', 'Carrots', 'Romaine Lettuce', 'Iceberg Lettuce'] => 0
 * list4 = ['Milk', 'Flour', 'Chocolate Milk', 'Pasta Sauce'] => 2
 * list5 = ['Cheese', 'Potatoes', 'Blueberries', 'Canned Tuna'] => 0
 *
 * All Test Cases:
 * shopping(products, list1) => 2
 * shopping(products, list2) => 2
 * shopping(products, list3) => 0
 * shopping(products, list4) => 2
 * shopping(products, list5) => 0
 *
 * Complexity Variable:
 * n: number of products
 */
final class ShoppingDepartments
{
    /**
     * Calculate the number of department visits saved.
     *
     * @param array<int, array{0: string, 1: string}> $products
     * @param string[] $shoppingList
     * @return int
     */
    public static function calculateSavedVisits(array $products, array $shoppingList): int
    {
        $productsByDepartments = self::getProductsByDepartments($products);
        $sortedListByDepartment = self::sortListByDepartment($shoppingList, $productsByDepartments);

        $originalVisits = self::countOriginalDepartmentVisits($shoppingList, $productsByDepartments);
        $optimizedVisits = count($sortedListByDepartment);

        return $originalVisits - $optimizedVisits;
    }

    /**
     * Group products by department.
     *
     * @param array<int, array{0: string, 1: string}> $products
     * @param bool $sort
     * @return array<string, string[]>
     */
    public static function getProductsByDepartments(array $products, bool $sort = true): array
    {
        $productsByDepartments = [];

        foreach ($products as $product) {
            $productName = $product[0];
            $department = $product[1];

            $productsByDepartments[$department][$productName] = $productName;
        }

        if ($sort) {
            foreach ($productsByDepartments as $departmentName => $departmentProductArray) {
                sort($productsByDepartments[$departmentName]);
            }
        }

        return $productsByDepartments;
    }

    /**
     * Sort shopping list items by department.
     *
     * @param string[] $shoppingList
     * @param array<string, string[]> $productsByDepartments
     * @return array<string, string[]>
     */
    public static function sortListByDepartment(array $shoppingList, array $productsByDepartments): array
    {
        $result = [];

        foreach ($shoppingList as $shoppingProductName) {
            foreach ($productsByDepartments as $departmentName => $products) {
                if (in_array($shoppingProductName, $products, true)) {
                    $result[$departmentName][] = $shoppingProductName;
                }
            }
        }

        return $result;
    }

    /**
     * Return a readable list of the products sorted by department.
     *
     * Example:
     * Produce(Blueberries/Carrots)->Pantry(Coffee/Flour)->Dairy(Milk/Cheese) = 3 department visits
     *
     * @param array<string, string[]> $productsByDepartments
     * @return string
     */
    public static function printProductsByDepartment(array $productsByDepartments): string
    {
        $strList = '';

        foreach ($productsByDepartments as $departmentName => $products) {
            if (!empty($strList)) {
                $strList .= '->';
            }

            $strList .= $departmentName . '(' . implode('/', $products) . ')';
        }

        $total = count($productsByDepartments);
        $strList .= ' = ' . $total . ' department visits';

        return $strList;
    }

    /**
     * Count department visits in the original shopping list order.
     *
     * @param string[] $shoppingList
     * @param array<string, string[]> $productsByDepartments
     * @return int
     */
    private static function countOriginalDepartmentVisits(array $shoppingList, array $productsByDepartments): int
    {
        $visits = 0;
        $previousDepartment = null;

        foreach ($shoppingList as $shoppingProductName) {
            $currentDepartment = self::findDepartmentByProduct($shoppingProductName, $productsByDepartments);

            if ($currentDepartment === null) {
                continue;
            }

            if ($currentDepartment !== $previousDepartment) {
                $visits++;
                $previousDepartment = $currentDepartment;
            }
        }

        return $visits;
    }

    /**
     * Find the department for a given product.
     *
     * @param string $productName
     * @param array<string, string[]> $productsByDepartments
     * @return string|null
     */
    private static function findDepartmentByProduct(string $productName, array $productsByDepartments): ?string
    {
        foreach ($productsByDepartments as $departmentName => $products) {
            if (in_array($productName, $products, true)) {
                return $departmentName;
            }
        }

        return null;
    }
}