<?php

declare(strict_types=1);

namespace DesignPatterns;

use DesignPatterns\Structural\Adapter\BotAnton;
use DesignPatterns\Structural\Adapter\EclerkAdapter;
use DesignPatterns\Structural\Adapter\GovermentClerk;
use PHPUnit\Framework\TestCase;

class StructuralTest extends TestCase
{
    public function testAdapter()
    {
        $clerk = new GovermentClerk();
        $r = $clerk->write();
        $this->assertSame('write', $r);
        $bot = new BotAnton();
        $clerk = new EclerkAdapter($bot);
        $r = $clerk->write();
        $this->assertSame('write', $r);
    }
}
