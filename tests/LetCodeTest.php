<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use src\LetCode;
use src\SortSearch\SortSearch;
use src\Structure\BinarySearchTree;
use src\Structure\ListNode;
use src\Structure\TreeNode;

class LetCodeTest extends TestCase
{
    private LetCode $le;

    private SortSearch $sortSearch;

    public function setUp(): void
    {
        static $count = 0;
        echo $count++ . "." . $this->getName() . "\n\n";
        $this->le = new LetCode();
        $this->sortSearch = new SortSearch();
    }

    public function testValidAnagram()
    {
        $str1 = "anagram";
        $str2 = "nagaram";
        $r = $this->le->isAnagram($str1, $str2);
        $this->assertEquals(true, $r);

        $str1 = "rat";
        $str2 = "cat";

        $r = $this->le->isAnagram($str1, $str2);
        $this->assertEquals(false, $r);
    }

    public function testValidParentheses()
    {
        $str1 = "(])";
        $r = $this->le->validParentheses($str1);
        $this->assertEquals(false, $r);

        $str1 = "()";
        $r = $this->le->validParentheses($str1);
        $this->assertEquals(true, $r);
    }

    public function testValidPalindrome()
    {
        $str = "A man, a plan, a canal: Panama";
        $r = $this->le->isPalindrome($str);
        $this->assertEquals(true, $r);

        $str = "race a car";
        $r = $this->le->isPalindrome($str);
        $this->assertEquals(false, $r);
    }

    public function testConvolution()
    {
        $str = 'AAAABBBCCXYZDDDDEEEFFFAAAAAABBBBBBBBBBBBBBBBBBBBBBBBBBBB';
        $r = $this->le->convolution($str);
        $expected = "A4B3C2XYZD4E3F3A6B28";
        $this->assertEquals($expected, $r, 'are not equals');
    }

    public function testTwoSum()
    {
        $letCode = new LetCode();
        $nums = [2, 2, 1];
        $target = 4;
        $indexTarget = [0, 1];
        $r = $letCode->twoSum($nums, $target);
        $this->assertEquals($indexTarget, $r, 'are not equals');
    }

    public function testMaxDepthTree()
    {
        $root = new TreeNode(1, null, new TreeNode(2));
        $r = $this->le->maxDepthTree($root);
        $target = 2;
        $this->assertEquals($target, $r, 'are not equals');
    }

    public function testBinarySearchTree()
    {
        $bst = new BinarySearchTree(4);
        $bst->insert(2);
        $bst->insert(7);
        $bst->insert(3);
        $bst->insert(1);
        $bst->insert(6);
        $bst->insert(9);
        $target = 6;
        $r = $bst->search($target);
        $this->assertEquals($target, $r->getValue(), 'are not equals');
        $this->assertNotEquals(300, $bst->search($target), 'are equal');
    }

    public function testMergeTwoList()
    {
        $list_1 = new ListNode(10);
        $list_2 = new ListNode(2);
        $list_2->next = new ListNode(18);
        $r = $this->le->mergeTwoSortedLists($list_1, $list_2);
        $expected = 10;
        $this->assertEquals($expected, $r->next->val);
    }

    public function testQuickSort()
    {
        $t = [87, 56, 4, 3, 2, 178, 6, 1, 789];
        $expected = [1, 2, 3, 4, 6, 56, 87, 178, 789];
        $sortArr = $this->sortSearch->quicksort($t);
        $this->assertEqualsCanonicalizing($expected, $sortArr);
    }

    public function testBubbleSort()
    {
        $t = [87, 56, 4, 3, 2, 178, 6, 1, 789];
        $expected = [1, 2, 3, 4, 6, 56, 87, 178, 789];
        $sortArr = $this->sortSearch->bubbleSort($t);
        $this->assertEqualsCanonicalizing($expected, $sortArr);
    }

    public function testFactorial()
    {
        $r = $this->le->fact(5);
        $expected = 120;
        $this->assertEquals($expected, $r);
    }

    public function testContainsDuplicate()
    {
        $t = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 1, 1];
        $expected = true;
        $r = $this->le->containsDuplicate($t);
        $this->assertEquals($expected, $r);

        $t = [1, 2, 3, 4, 5];
        $expected = false;
        $r = $this->le->containsDuplicate($t);
        $this->assertEquals($expected, $r);
    }

    public function testReverseList()
    {
        $l = new ListNode(1, new ListNode(2, new ListNode (3, new ListNode(4, new ListNode (5)))));
        $expected = new ListNode(5, new ListNode(4, new ListNode (3, new ListNode(2, new ListNode (1)))));
        $r = $this->le->reverseList($l);
        $this->assertEquals($expected, $r);
    }

    public function testInSpace()
    {
        $l = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $r = $this->sortSearch->inPlace($l);
        $expected = [9, 8, 7, 6, 5, 4, 3, 2, 1];
        $this->assertEquals($expected, $r);
    }
}
