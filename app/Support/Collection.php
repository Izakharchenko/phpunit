<?php declare(strict_types=1);

namespace App\Support;

use ArrayIterator;
use IteratorAggregate;
use JsonSerializable;

class Collection implements IteratorAggregate, JsonSerializable
{
    protected $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function get()
    {
        return $this->items;    
    }

    public function count()
    {
        return count($this->items);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }

    public function marge(Collection $collection)
    {
        return $this->add($collection->get());
    }

    public function add(array $items)
    {
        $this->items = array_merge($this->items, $items); 
    }

    public function toJson()
    {
        return json_encode($this->items);
    }

    public function jsonSerialize()
    {
        return $this->items;
    }

}