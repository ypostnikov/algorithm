<?php

declare(strict_types=1);

namespace src\Structure;

/**
 * @info Односвязанный список
 */
final class ListNode
{
    /**
     * @var int
     */
    public int $val = 0;

    /**
     * @var ListNode|null
     */
    public ?ListNode $next = null;

    function __construct(int $val = 0, ListNode $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->val;
    }
}