<?php

declare (strict_types=1);

namespace src;

use src\Structure\ListNode;
use src\Structure\TreeNode;

/**
 *
 */
final class LetCode
{

    /**
     * @info https://leetcode.com/problems/two-sum/
     * @param array $nums
     * @param int $target
     * @return array|int[]
     */
    public  function twoSum(array $nums, int $target): array
    {
        $len = count($nums);
        for ($i = 0; $i < $len; $i++) {
            $div = $target - $nums[$i];
            $searchedIndex = array_search($div, $nums);
            $common = count(array_keys($nums, $div));
            //bound case
            if ($len == 2 && $nums[1] == $div) {
                return [0, 1];
            }
            if ($searchedIndex == $i && $common == 1) {
                continue;
            }
            if ($searchedIndex == 0 && $i != $len - 1 && $common == 1) {
                continue;
            }
            //bound case
            if ($common == 2) {
                for ($j = $i + 1; $j < $len; $j++) {
                    if ($div == $nums[$j]) {
                        return [$i, $j];
                    }
                }
            }
            if ($searchedIndex !== false) {
                return [$i, $searchedIndex];
            }
        }
        return [];
    }

    /**
     * @info https://leetcode.com/problems/valid-parentheses/
     * @param string $str
     * @return bool
     */
    public function validParentheses(string $str): bool
    {
        $stack = new \SplStack();
        $accordance = [
            '(' => ')',
            '<' => '>',
            '{' => '}',
            '[' => ']',
        ];
        //поменять ключи и значения
        $reverseAccordance = array_flip($accordance);
        for ($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];
            if (array_key_exists($char, $accordance)) {
                $stack->push($char);
            } else if ($stack->count() == 0) {
                return false;
            } else if ($reverseAccordance[$char] == $stack->top()) {
                $stack->pop();
            } else {
                return false;
            }
        }
        if ($stack->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @info https://leetcode.com/problems/merge-two-sorted-lists/
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    public  function mergeTwoLists(ListNode $list1, ListNode $list2)
    {
        $head = $list = new ListNode();

        do {
            if (!$list1 || ($list2 && $list1->val > $list2->val)) {
                $list->next = new ListNode($list2->val);
                $list2 = $list2->next;
            } else {
                $list->next = new ListNode($list1->val);
                $list1 = $list1->next;
            }
            $list = $list->next;
        } while ($list1 || $list2);

        return $head->next;
    }

    /**
     * @info https://leetcode.com/problems/valid-palindrome/
     * @param String $s
     * @return Boolean
     */
    public  function isPalindrome(string $s): bool
    {
        $cleared = strtolower(preg_replace('/[^a-z0-9 ]/i', '', $s));
        $cleared = preg_replace('/\s+/', '', $cleared);
        $len = strlen($cleared);
        $str = "";
        for ($i = ($len - 1); $i >= 0; $i--) {
            $str .= $cleared[$i];
        }
        return $cleared === $str;
    }

    /**
     * @info @info https://leetcode.com/problems/invert-binary-tree/
     * @param TreeNode $root
     * @return TreeNode|null
     */
    public function invertTree(TreeNode $root): ?TreeNode
    {
        if (!$root) {
            return $root;
        }
        //Логика.Поменять левую и правые части, рекурсивно инвертировав
        //Бинарное дерево (левая/правая часть)
        $sourceLeft = $root->left;
        $sourceRight = $root->right;

        $root->left = $this->invertTree($sourceRight);
        $root->right = $this->invertTree($sourceLeft);

        return $root;
    }

}