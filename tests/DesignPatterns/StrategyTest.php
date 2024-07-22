<?php

declare(strict_types=1);

namespace DesignPatterns;

use DesignPattern\Behavioral\Strategy\Context;
use DesignPattern\Behavioral\Strategy\FirstStrategy;
use DesignPattern\Behavioral\Strategy\SecondStrategy;
use PHPUnit\Framework\TestCase;

class StrategyTest extends TestCase
{

    public function testStrategy()
    {
        $c = ["orange", "banana", "apple", "raspberry"];
        $ft = new Context(new FirstStrategy());
        $expected = "orange";
        $r = $ft->handle($c);
        $this->assertSame($expected, $r);

        $c = ["orange", "banana", "apple", "raspberry"];
        $st = new Context(new SecondStrategy());
        $expected = "raspberry";
        $r = $st->handle($c);
        $this->assertSame($expected, $r);
    }
}
