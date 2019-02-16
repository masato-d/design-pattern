<?php

namespace App\Iterator;

class DepartmentIteratorAggregate implements \IteratorAggregate
{
    private $name;
    private $employees;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getIterator()
    {
        foreach ($this->employees as $key => $employee) {
            yield $key => $employee;
        }
    }

    public function addEmployee(Employee $employee): DepartmentIteratorAggregate
    {
        $this->employees[] = $employee;
        return $this;
    }
}