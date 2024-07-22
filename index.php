<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use src\LetCode;
use src\Tricks;
use src\SortSearch\SortSearch;
use src\Structure\TreeNode;
use src\Structure\LinkedList;
use src\UiHelper;

$uiHelper = UiHelper::getInstance();

echo "<h1>Algorithms and Structure</h1>";

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
$uiHelper->outputHeader("Linear search");
$ss->linear_search($ordered_arr, $searched);
$uiHelper->outputHeader("Binary search");
$ss->binary_search($ordered_arr, $searched);
$uiHelper->outputHeader("Quick Sort");
$sortArr = $ss->quicksort([87, 56, 4, 3, 2, 178, 6, 1, 789]);
var_dump($sortArr);
$uiHelper->outputHeader("Bubble Sort");
var_dump($ss->bubbleSort([87, 56, 4, 3, 2, 178, 6, 1, 789]));

$d = new Tricks();
$f = $d->fact(5);
$uiHelper->outputHeader("Factorail");
echo "<div>{$f} </div>";


/**
 ******
 ************************** LETCODE******************************************************************************************
 ******
 **/

echo "<h1>Let's Code challenge</h1>";
$letCode = new LetCode();
echo "<div><b>ListNode</b></div>";
$rightNode = new TreeNode(3, null, new TreeNode(1));
$tNode = new TreeNode(2, null, $rightNode);
echo "<br>";
$iNode = $letCode->invertTree($tNode);
echo "<br>";
echo "<pre>";
//var_dump("InvertNode", $iNode);
echo "</pre>";
$limitArray = array_slice($ordered_arr, 0, 5);
$ll = new LinkedList();
foreach ($limitArray as $value) {
    $ll->append($value);
}
//$ll->print();
