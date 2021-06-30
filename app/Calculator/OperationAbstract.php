<?php

namespace App\Calculator;

abstract class OperationAbstract
{
    public $operands = [];
    
    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }
} 