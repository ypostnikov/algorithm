<?php

declare(strict_types=1);

namespace DesignPattern\Behavioral\Strategy;

class Context
{
    public function __construct(private Strategy $strategy)
    {
    }

    /**
     * @param array $bunch
     * @return string
     */
    public function handle(array $bunch): string
    {
        return $this->strategy->handle($bunch);
    }
}
