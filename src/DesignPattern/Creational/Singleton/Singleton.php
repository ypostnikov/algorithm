<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod;

use Exception;

final class Singleton
{
    private static ?Singleton $instance = null;

    /**
     * @return Singleton
     */
    public static function getInstance(): Singleton
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
        throw new Exception("Error");
    }
}
