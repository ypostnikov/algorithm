<?php

declare(strict_types=1);

namespace src\Structure;

/**
 *
 */
final class BinarySearchTree
{

    public ?TreeNode  $root= null;

    public function __construct(int $value = null)
    {
        if($value) {
            $this->root = new TreeNode($value);
        }
   }

    /**
     * @param int $value
     * @return TreeNode|null
     */
   public function search(int $value): ?TreeNode{
       $node = $this->root;
       while($node) {
           if ($value > $node->val) {
               $node = $node->right;
           } elseif ($value < $node->val) {
               $node = $node->left;
           } else {
               break;
           }
       }
       return $node;
   }

    /**
     * @param int $value
     * @return TreeNode
     */
    public function insert(int $value): TreeNode
    {
        $node = $this->root;
        if (!$node) {
            return $this->root = new TreeNode($value);
        }

        while($node) {
            if ($value > $node->val) {
                if ($node->right) {
                    $node = $node->right;
                } else {
                    $node = $node->right = new TreeNode($value);
                    break;
                }
            } elseif ($value < $node->val) {
                if ($node->left) {
                    $node = $node->left;
                } else {
                    $node = $node->left = new TreeNode($value);
                    break;
                }
            } else {
                break;
            }
        }
        return $node;
    }
}
