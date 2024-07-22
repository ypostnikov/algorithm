<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

interface EClerk
{
    public function write(): string;

    public function read(): string;

    public function turnOff();
}
