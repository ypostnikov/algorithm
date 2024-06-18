<?php

declare(strict_types=1);

namespace src;

final class Tricks
{

    /**
     * Рекурсия. Разделяй и властвуй
     * @return void
     */
    public function recur()
    {
        //1.определить базовый случай
        //2.привести к базовому.определить пограничные случаи
    }

    /**
     * @param int $n
     * @return int
     */
    public function fact(int $n): int
    {
        if ($n == 1) {
            return 1;
        }
        return $n * $this->fact($n - 1);
    }

    /**
     * Быстрая сортировка рекурсия
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
        $pivotKey = rand(0, count($arr) - 1);
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