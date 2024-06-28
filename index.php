<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use \src\SortSearch\SortSearch;
use \src\Structure\ListNode;
use \src\LetCode;

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
$ss = new SortSearch();
$ss->linear_search($ordered_arr, $searched);
$ss->binary_search($ordered_arr, $searched);
echo"<div>Quick Sort</div>";
$sortArr = $ss->quicksort([87, 56, 4, 3, 2, 178, 6, 1, 789]);
var_dump($sortArr);

echo"<div>Bubble Sort</div>";
var_dump($ss->bubbleSort([87, 56, 4, 3, 2, 178, 6, 1, 789]));


$d = new \src\Tricks();
$f = $d->fact(5);
echo "<div>Factorail {$f} </div>";

/**
 * LetCode
 */

print ("<br><b>Let`s Code</b><br>");
$letCode = new LetCode ();
$nums = [2, 2, 1];
$target = 4;
var_dump($letCode->twoSum($nums, $target));
echo "<br>";
$r = $letCode->validParentheses("(])");
var_dump($r);

echo "<div><b>ListNode<b/></div>";
$list_1 = new ListNode(1);
$list_1->next = new ListNode(2);
$list_1->next->next = new ListNode(3);
var_dump($list_1);

$list_2 = new ListNode(1);
$list_2->next = new ListNode(3);
$list_2->next->next = new ListNode(4);
$r = $letCode->mergeTwoLists($list_1, $list_2);
var_dump($r);
