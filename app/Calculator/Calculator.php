<?php
declare(strict_types=1);

namespace App\Calculator;
ini_set("error_reporting", 'E_ALL~E_NOTICE');
class Calculator
{
    protected $operations = [];
    
    public function setOperation(OperationInterface $operation): void
    {
        $this->operations[] = $operation;
    }
    
    public function setOperations(array $operations): void
    {
        @$this->$operations = array_merge($this->operations, $operations);
    }
    
    public function getOperations(): array
    {
        return $this->operations;
    }
    
}