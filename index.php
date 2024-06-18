<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

const BIG = 10000;
$ordered_arr = [];
$i = 0;
while ($i <= BIG) {
    $ordered_arr[$i] = $i;
    $i++;
}

$searched = rand(1, BIG);
$numbers = range(1, BIG);
shuffle($numbers);

linear_search($ordered_arr, $searched);

binary_search($ordered_arr, $searched);

$d = new \src\Tricks();
$f = $d->fact(5);
echo "<div>Factorail {$f} </div>";
$sortArr = $d->quicksort([87,56,4,3,2,178,6,1,789]);
var_dump ($sortArr);

/**
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
 * @param array $arr
 * @param int $search
 * @return int|null
 */
function binary_search(array $arr, int $search): ?int
{
    //O(log n)
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
