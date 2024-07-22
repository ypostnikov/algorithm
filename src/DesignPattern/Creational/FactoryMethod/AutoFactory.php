<?php

declare(strict_types=1);

namespace DesignPattern\Creational\FactoryMethod;

class AutoFactory extends TransportFabric
{
    public function createTransport(string $type): Transport
    {
        return match ($type) {
            'toyota' => new Toyota(),
            'pego' => new Pego(),
             default => throw new \InvalidArgumentException('неизвестный тип транспорта'),
        };
    }
}
