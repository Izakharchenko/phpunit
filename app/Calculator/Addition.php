<?php

declare(strict_types=1);

namespace App\Calculator;

use App\Calculator\OperationInterface;
use App\Calculator\Exceptions\NoOperandsExceptions;
use App\Calculator\OperationAbstract;

class Addition extends OperationAbstract implements OperationInterface
{
    public function calculate()
    {
        if (count($this->operands) === 0) {
            throw new NoOperandsExceptions;
        }
        return array_sum($this->operands);
    }
}