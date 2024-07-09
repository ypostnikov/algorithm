<?php

declare(strict_types=1);

namespace src\Structure;

final class TreeNode
{
    public ?int $val = null;
    public ?TreeNode $left = null;
    public ?TreeNode $right = null;

    function __construct(int $val = 0, TreeNode $left = null, TreeNode $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * @return int
     */
    function getValue(): int
    {
        return $this->val;
    }
}