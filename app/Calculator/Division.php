<?php

declare(strict_types=1);

namespace App\Calculator;

use App\Calculator\OperationInterface;
use App\Calculator\OperationAbstract;
use App\Calculator\Exceptions\NoOperandsExceptions;

class Division extends OperationAbstract implements OperationInterface
{
    public function calculate()
    {
        if (count($this->operands) === 0) {
            throw new NoOperandsExceptions;
        }
        return array_reduce($this->operands, function($carry, $item) {
            if ($carry !== null && $item !== null) { 
                try {
                    $carry /= $item;
                } catch(\DivisionByZeroError $e) {
                    return $e->getMessage();
                }
                return $carry;
            }

            return $item;
        }, null);
    }
}