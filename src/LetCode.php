<?php

declare (strict_types=1);

namespace src;

use src\Structure\ListNode;
use src\Structure\TreeNode;

class LetCode
{

    /**
     * @info https://leetcode.com/problems/two-sum/
     * @param array $nums
     * @param int $target
     * @return array|int[]
     */
    public function twoSum(array $nums, int $target): array
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
            } else {
                if ($stack->count() == 0) {
                    return false;
                } else {
                    if ($reverseAccordance[$char] == $stack->top()) {
                        $stack->pop();
                    } else {
                        return false;
                    }
                }
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
    public function mergeTwoSortedLists(ListNode $list1, ListNode $list2)
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
    public function isPalindrome(string $s): bool
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
     * @info https://leetcode.com/problems/invert-binary-tree/
     * @param TreeNode|null $root
     * @return TreeNode|null
     */
    public function invertTree(?TreeNode $root): ?TreeNode
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

    /**
     * https://leetcode.com/problems/maximum-depth-of-binary-tree/
     * @param TreeNode|null $root
     * @return int
     */
    public function maxDepthTree(?TreeNode $root): int
    {
        if (!$root) {
            return 0;
        }
        $leftDepth = $this->maxDepthTree($root->left);;
        $rightDepth = $this->maxDepthTree($root->right);
        return 1 + max($leftDepth, $rightDepth);
    }

    /**
     * @info Свертка строки. Подсчет количества символов
     * @param string $str
     * @return string|null
     */
    public function convolution(string $str): ?string
    {
        $validation = ('' !== $str && !preg_match('/[^A-Z]/', $str));
        $r = "";
        $len = strlen($str);
        $counter = 1;
        if (!$validation) {
            return null;
        }

        for ($i = 0; $i < $len; $i++) {
            $char = $str[$i];
            if (isset($str[$i + 1]) && $str[$i + 1] === $char) {
                $counter += 1;
                continue;
            } else {
                if ($counter > 1) {
                    $r .= $char . $counter;
                    $counter = 1;
                } else {
                    $r .= $char;
                }
            }
        }
        return $r;
    }


    /**
     * $info https://leetcode.com/problems/valid-anagram/
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram(string $s, string $t): bool
    {
        $len = strlen($t);
        if ($len != strlen($s)) {
            return false;
        }

        $tA = array_count_values(str_split($t, 1));
        $sA = array_count_values(str_split($s, 1));

        foreach ($tA as $key => $value) {
            if (isset($sA[$key]) && $value == $sA[$key]) {
                continue;
            } else {
                return false;
            }
        }
        return true;
    }

    /**
     * @info https://leetcode.com/problems/balanced-binary-tree/
     * @param TreeNode $root
     * @return TreeNode|null
     */
    public function isBalancedTreeBinary(?TreeNode $root): ?TreeNode
    {
    }

    /**
     * @info https://leetcode.com/problems/linked-list-cycle/
     * Decision Fast and Slow pointer
     * @param $head
     * @return bool
     */
    public function linkedListCycle($head): bool
    {
        $fastPointer = $slowPointer = $head;
        while ($fastPointer && $fastPointer->next) {
            $slowPointer = $slowPointer->next;
            $fastPointer = $fastPointer->next->next;
            if ($slowPointer === $fastPointer) {
                return true;
            }
        }
        return false;
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
     * @info https://leetcode.com/problems/contains-duplicate/
     * @param array $nums
     * @return bool
     */
    public function containsDuplicate(array $nums): bool
    {
        $t = [];
        foreach ($nums as $value) {
            if (isset($t[$value])) {
                return true;
            }
            $t[$value] = 1;
        }
        return false;
    }

    /**
     * @info https://leetcode.com/problems/reverse-linked-list/description/
     * @param $head
     * @return ListNode
     */
    public function reverseList($head): ListNode
    {
        if (!$head->next) {
            return $head;
        }
        $newHead = $this->reverseList($head->next);
        $head->next->next = $head;
        $head->next = null;
        return $newHead;
    }
}

