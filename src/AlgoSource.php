<?php

declare(strict_types=1);

namespace src;

interface AlgoSource
{
    /**
     * @return void
     */
    public function execute(): void;
}