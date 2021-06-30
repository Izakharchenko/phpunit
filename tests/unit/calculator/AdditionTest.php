<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class Addition extends TestCase
{
    /**@test */
    public function testAddUpGivenOperands()
    {
        $addition = new App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $this->assertEquals(15, $addition->calculate());
    }

    /**@test */
    public function testNoOperandsGivenThrowsExceptionWhenCalculation()
    {
        $this->expectException(App\Calculator\Exceptions\NoOperandsExceptions::class);
        $addition = new App\Calculator\Addition;
        $addition->calculate();
    }
}