<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

class GovermentClerk implements Clerk
{
    public function read(): string
    {
        return 'read';
    }

    public function out()
    {
    }

    public function write(): string
    {
        return 'write';
    }
}
