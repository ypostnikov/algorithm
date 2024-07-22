<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod;

abstract class TransportFabric
{
    abstract public function createTransport(string $type): Transport;
}
