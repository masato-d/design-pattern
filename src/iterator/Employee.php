<?php

namespace App\Iterator;

class Employee
{
    private $number;
    private $name;

    public function __construct(int $number, string $name)
    {
        $this->number = $number;
        $this->name   = $name;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getName(): string
    {
        return $this->name;
    }
}