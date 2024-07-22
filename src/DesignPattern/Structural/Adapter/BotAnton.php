<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

use Elastic\Apm\ElasticApm;

class BotAnton implements EClerk
{
    /**
     * @return mixed
     */
    public function write(): string
    {
        return 'write';
    }

    /**
     * @return mixed
     */
    public function read(): string
    {
        return 'read';
    }

    /**
     * @return mixed
     */
    public function turnOff()
    {
    }
}
