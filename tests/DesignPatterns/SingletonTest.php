<?php

declare(strict_types=1);

namespace DesignPatterns;

use PHPUnit\Framework\TestCase;
use DesignPattern\Creational\FactoryMethod\Singleton;

class SingletonTest extends TestCase
{
    public function testUniqueness()
    {
        $firstCall = Singleton::getInstance();
        $secondCall = Singleton::getInstance();
        $this->assertInstanceOf(Singleton::class, $firstCall);
        $this->assertSame($firstCall, $secondCall);
    }
}
