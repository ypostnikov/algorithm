<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use \src\LetCode;
use \src\SortSearch\SortSearch;
use \src\Structure\ListNode;
use \src\Structure\BinarySearchTree;
use \src\Structure\TreeNode;

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
echo "<div>Quick Sort</div>";
$sortArr = $ss->quicksort([87, 56, 4, 3, 2, 178, 6, 1, 789]);
var_dump($sortArr);

echo "<div>Bubble Sort</div>";
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
$pal = "A man, a plan, a canal: Panama";
var_dump($letCode->isPalindrome($pal));

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

var_dump('InvertNode', $iNode);

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

$str = "AAAABBBCCXYZDDDDEEEFFFAAAAAABBBBBBBBBBBBBBBBBBBBBBBBBBBB";
echo "<br>";
var_dump( "Получ - ", $letCode->spawn($str) );
echo "<br>";
var_dump("Ожида - ", "A4B3C2XYZD4E3F3A6B28");

$str1 = "anagtam";
$str2 = "nbgbram";
echo "<br>";
var_dump( $str1,$str2, "anagram:", $letCode->isAnagram($str1, $str2));
echo "<br>";


