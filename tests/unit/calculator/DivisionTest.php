<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Calculator\Division;

class DivisionTest extends TestCase
{
    public function testDividesGivenOperands()
    {
        $division = new Division;
        
        $division->setOperands([100, 2]);
        $this->assertEquals(50, $division->calculate());
    }

    /**
      * @expectedException DivisionByZeroError
     */
    // public function testCaughtDivisionByZero()
    // {
    //     $this->expectError();

    //     $division = new Division;
        
    //     $division->setOperands([100, 0]);
        
    // }


}