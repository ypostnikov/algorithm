<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Strategy;

class FirstStrategy implements Strategy
{
    /**
     * @param array $bunch
     * @return string
     */
    public function handle(array $bunch): string
    {
        return $bunch[0];
    }
}
