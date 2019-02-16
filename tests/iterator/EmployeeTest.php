<?php

namespace Test\Iterator;

use App\Iterator\Employee;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * @dataProvider provideGetNumberTestData
     */
    public function testGetNumber($number, $name, $expected)
    {
        $employee = new Employee($number, $name);
        $this->assertEquals($expected, $employee->getNumber());
    }

    public function provideGetNumberTestData(): array
    {
        return [
            [1, 'Test Employee1', 1],
            [2, 'Test Employee2', 2],
            [3, 'Test Employee3', 3],
        ];
    }

    /**
     * @dataProvider provideGetNameTestData
     */
    public function testGetName($number, $name, $expected)
    {
        $employee = new Employee($number, $name);
        $this->assertEquals($expected, $employee->getName());
    }

    public function provideGetNameTestData(): array
    {
        return [
            [1, 'Test Employee1', 'Test Employee1'],
            [2, 'Test Employee2', 'Test Employee2'],
            [3, 'Test Employee3', 'Test Employee3'],
        ];
    }
}