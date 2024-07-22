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
}
