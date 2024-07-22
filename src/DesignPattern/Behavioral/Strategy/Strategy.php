<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Strategy;

interface Strategy
{
    /**
     * @param array $bunch
     * @return string
     */
    public function handle(array $bunch): string;
}
