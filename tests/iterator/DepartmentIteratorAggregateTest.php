<?php

namespace Test\Iterator;

use App\Iterator\Employee;
use App\Iterator\DepartmentIteratorAggregate;
use PHPUnit\Framework\TestCase;

class DepartmentIteratorAggregateTest extends TestCase
{
    private $testEmployee;

    public function setUp()
    {
        $this->testEmployee = new Employee(1, 'Test Employee1');
    }

    public function testIsIteratable()
    {
        $department = new DepartmentIteratorAggregate('Test Department');
        $this->assertTrue(is_iterable($department));

        $department->addEmployee($this->testEmployee);
        foreach ($department as $employee) {
            $this->assertEquals($this->testEmployee, $employee);
        }
    }

    public function testAddEmployee()
    {
        $department = new DepartmentIteratorAggregate('Test Department');
        $result = $department->addEmployee($this->testEmployee);

        $this->assertEquals($department, $result);
        $this->assertThat(
            $department,
            $this->contains($this->testEmployee)
        );
    }
}