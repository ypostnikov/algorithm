<?php

declare(strict_types=1);

namespace src\SortSearch;

final class SortSearch
{

    /**
     * @info Бинарный поиск
     * Сложность O(n log n)
     * @param array $arr
     * @param int $search
     * @return int|null
     */
    function binary_search(array $arr, int $search): ?int
    {
        echo "<div>Binary search:</div>";
        $start = microtime(true);
        $low = 0;
        $high = count($arr) - 1;
        $i = 0;
        while ($low <= $high) {
            $i++;
            $mid = round(($low + $high) / 2);
            $guess = $arr[$mid];
            if ($guess == $search) {
                $time = round(microtime(true) - $start, 6);
                echo "Find key: {$mid}.Search:{$search}.Time: {$time}.Iter:{$i}";
                return (int)$mid;
            }
            if ($guess > $search) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }
        $time = round(microtime(true) - $start, 6);
        echo "<div>Search {$search} not found . Time: {$time}";
        return null;
    }

    /**
     * @info Линейный поиск
     * Сложность O(n)
     * @param array $arr
     * @param int $search
     * @return void
     */
    function linear_search(array $arr, int $search): void
    {
        //O(n)
        $start = microtime(true);
        $low = 0;
        $high = count($arr);
        while ($low < $high) {
            if ($search == $arr[$low]) {
                $time = round(microtime(true) - $start, 6);
                echo "<div>Linear search:</div> Find key {$low}. Time: {$time}.Iter:{$low}";
            }
            $low++;
        }
    }

    /**
     * @info Сортировка пузырьком
     * Сложность O(n*n)
     * @param array $arr
     * @return array
     */
    function bubbleSort(array $arr): array
    {
        $len = count($arr);
        for ($i = 0; $i < $len - 1; $i++) {
            for ($j = 0; $j < $len - $i - 1; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $temp;
                }
            }
        }
        return $arr;
    }

    /**
     * Быстрая сортировка рекурсия
     * Сложность О(n log n)
     * @param array $arr
     * @return array
     */
    public function quicksort(array $arr): array
    {
        $len = count($arr);
        //Базовый случай
        if ($len <= 1) {
            return $arr;
        }

        $left = $right = array();
        //$pivotKey = round($len / 2);
        $pivotKey = rand(0, $len - 1);
        $pivot = $arr[$pivotKey];
        foreach ($arr as $key => $value) {
            //Пограничный случай
            if ($key == $pivotKey) {
                continue;
            }
            if ($value <= $pivot) {
                $left[] = $value;
            } else {
                $right[] = $value;
            }
        }
        return array_merge($this->quicksort($left), array($pivot), $this->quicksort($right));
    }
}