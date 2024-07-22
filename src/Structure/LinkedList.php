<?php

declare(strict_types=1);

namespace src\Structure;

final class LinkedList
{
    /**
     * @var ListNode|null
     */
    private ?ListNode $head = null;

    private int $size = 0;

    /**
     *  Добавление элемента в конец списка
     * @param int $n
     * @return void
     */
    public function append(int $n): void
    {
        $node = new ListNode($n);
        if ($this->size == 0) {
            $this->head = $node;
        } else {
            $currentNode = $this->head;
            while ($currentNode->next !== null) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $node;
        }
        $this->size++;
    }

    /**
     * Вставка занчения в позицию
     * @param int $index
     * @param $val
     * @return void
     */
    public function insert(int $index, $val): void
    {
        //@todo  -- вставка  элемента в определенную позицию
    }

    /**
     *  Размер списка
     * @return int
     */
    public function size(): int
    {
        return $this->size;
    }

    /**
     * @return void
     */
    public function print(): void
    {
        $currentNode = $this->head;
        $tmp = [];
        while ($currentNode->next) {
            $tmp [] = $currentNode->val;
            $currentNode = $currentNode->next;
        }
        //last elements
        if ($currentNode->next === null) {
            $tmp [] = $currentNode->val;
        }
        var_dump($tmp);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->size === 0;
    }
}
