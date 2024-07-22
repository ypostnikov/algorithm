<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

interface Clerk
{
    public function read(): string;

    public function out();

    public function write(): string;

}