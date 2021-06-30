<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Calculator\Addition;
use App\Calculator\Calculator;

class CalculatorTest extends TestCase {

    public function testCanSetSingleOperation()
    {
        $addition = new Addition();
        $addition->setOperands([5, 15]);

        $calculator = new Calculator();
        $calculator->setOperation($addition);

        $this->assertCount(1, $calculator->getOperations());
    }

    public function testCanSetMultipleOperations(): void
    {
        $addition1 = new Addition();
        $addition1->setOperands([5, 15]);
        
        $addition2 = new Addition();
        $addition2->setOperands([2, 2]);

        $calculator = new Calculator();
        $calculator->setOperations([$addition1, $addition2]);
        
        $this->assertCount(2, $calculator->getOperations());
    }
}