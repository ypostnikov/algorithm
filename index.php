<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use src\LetCode;
use src\Tricks;
use src\SortSearch\SortSearch;
use src\Structure\ListNode;
use src\Structure\BinarySearchTree;
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
 ******
 ************************** LETCODE******************************************************************************************
 ******
 ******
 **/

echo "<h1>Let's Code challenge</h1>";

$letCode = new LetCode();
echo "<div><b>ListNode</b></div>";
$list_1 = new ListNode(1);
$list_1->next = new ListNode(2);
$list_1->next->next = new ListNode(3);
var_dump($list_1);

$list_2 = new ListNode(1);
$list_2->next = new ListNode(3);
$list_2->next->next = new ListNode(4);
$r = $letCode->mergeTwoLists($list_1, $list_2);
var_dump($r);

echo "<br>";
$bst = new BinarySearchTree(4);
$bst->insert(2);
$bst->insert(7);
$bst->insert(3);
$bst->insert(1);
$bst->insert(6);
$bst->insert(9);

//$leftNode = new TreeNode(2, new TreeNode(1), new TreeNode(3));
//$rightNode = new TreeNode(7, new TreeNode(6), new TreeNode(9));
//$tNode = new TreeNode(4, $leftNode, $rightNode);

//$leftNode = new TreeNode(1);
$rightNode = new TreeNode(3, null, new TreeNode(1));
$tNode = new TreeNode(2, null, $rightNode);

echo "<br>";
//var_dump($tNode);

echo "<br>";
$iNode = $letCode->invertTree($tNode);
echo "<br>";

echo "<pre>";
var_dump("InvertNode", $iNode);
echo "</pre>";

echo "<br>";
//print_r($bst);
echo "<br>";
$r = $bst->search(9);
if (!is_null($r)) {
    //var_dump($r);
    echo "BST search:" . $r->getValue();
} else {
    echo 'No result bst search';
}

//print_r(Base1::create());

$limitArray = array_slice($ordered_arr, 0, 5);
$ll = new LinkedList();

foreach ($limitArray as $value) {
    $ll->append($value);
}

//echo '<pre>';
//var_dump($ll);
//echo '</pre>';

$ll->print();
