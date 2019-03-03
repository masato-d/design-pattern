<?php

namespace App\Iterator;

class DepartmentIterator implements \Iterator
{
    private $name;
    private $employees = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function current()
    {
        return current($this->employees);
    }

    public function key()
    {
        return key($this->employees);
    }

    public function next()
    {
        return next($this->employees);
    }

    public function rewind()
    {
        reset($this->employees);
    }

    public function valid()
    {
        return $this->current() !== false;
    }

    public function addEmployee(Employee $employee): DepartmentIterator
    {
        $this->employees[] = $employee;
        return $this;
    }
}