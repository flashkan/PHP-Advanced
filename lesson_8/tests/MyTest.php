<?php

namespace App\tests;

use PHPUnit\Framework\TestCase;

class MyTest extends TestCase
{
    public function testFirst()
    {
        $this->assertTrue(true);
        $this->assertEquals(4, 4);
    }

    public function testSecond()
    {
        $this->assertEquals(3, 4);
    }
}