<?php

declare(strict_types=1);

namespace DesignPatterns;

use DesignPattern\Creational\FactoryMethod\AutoFactory;
use DesignPattern\Creational\FactoryMethod\Pego;
use DesignPattern\Creational\FactoryMethod\Toyota;
use PHPUnit\Framework\TestCase;
use InvalidArgumentException;

class CreationalTest extends TestCase
{

    public function testFactoryMethod()
    {
        $autoFactory = new AutoFactory();
        $toyota = $autoFactory->createTransport('toyota');
        $this->assertInstanceOf(Toyota::class, $toyota);
        $pego  = $autoFactory->createTransport('pego');
        $this->assertInstanceOf(Pego::class, $pego);
    }

    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
        $autoFactory = new AutoFactory();
        $autoFactory->createTransport('object');
    }
}
