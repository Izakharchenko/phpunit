<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase
{
    public function testAssertTrueToTrue()
    {
        $this->assertTrue(true);
    }
}