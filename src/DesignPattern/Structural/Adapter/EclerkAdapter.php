<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

class EclerkAdapter implements Clerk
{
    /**
     * @param EClerk $clerk
     */
    public function __construct(private EClerk $clerk)
    {
    }

    /**
     * @return mixed
     */
    public function read(): string
    {
        $this->clerk->read();
    }

    /**
     * @return mixed
     */
    public function out()
    {
        return $this->clerk->turnOff();
    }

    /**
     * @return mixed
     */
    public function write(): string
    {
        return $this->clerk->write();
    }
}
