<?php

declare (strict_types=1);

namespace src;

use src\Structure\ListNode;

final class LetCode
{

    /**
     * @info https://leetcode.com/problems/two-sum/
     * @param array $nums
     * @param int $target
     * @return array|int[]
     */
    function twoSum(array $nums, int $target): array
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
            if($searchedIndex == $i && $common == 1) {
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
    function validParentheses(string $str): bool
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
    function mergeTwoLists(ListNode $list1, ListNode $list2)
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
}