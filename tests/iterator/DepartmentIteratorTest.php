<?php

namespace Test\Iterator;

use App\Iterator\Employee;
use App\Iterator\DepartmentIterator;
use PHPUnit\Framework\TestCase;

class DepartmentIteratorTest extends TestCase
{
    private $testEmployee;

    public function setUp()
    {
        parent::setUp();
        $this->testEmployee = new Employee(1, 'Test Employee1');
    }

    public function testCurrentNotEmpty()
    {
        $department = new DepartmentIterator('Test Department');
        $department->addEmployee($this->testEmployee);
        $this->assertEquals($this->testEmployee, $department->current());
    }

    public function testCurrentEmpty()
    {
        $department = new DepartmentIterator('Test Department');
        $this->assertFalse($department->current());
    }

    public function testKeyNotEmpty()
    {
        $department = new DepartmentIterator('Test Department');
        $department->addEmployee($this->testEmployee);
        $this->assertEquals(0, $department->key());
    }

    public function testKeyEmpty()
    {
        $department = new DepartmentIterator('Test Department');
        $this->assertNull($department->key());
    }

    public function testNextNotEmpty()
    {
        $department = new DepartmentIterator('Test Department');
        $department->addEmployee(new Employee(2, 'current'))->addEmployee($this->testEmployee);
        $this->assertEquals($this->testEmployee, $department->next());
    }

    public function testNextEmpty()
    {
        $department = new DepartmentIterator('Test Department');
        $this->assertFalse($department->next());
    }

    public function testValidFalse()
    {
        $department = new DepartmentIterator('Test Department');
        $this->assertFalse($department->valid());
    }

    public function testValidTrue()
    {
        $department = new DepartmentIterator('Test Department');
        $department->addEmployee(new Employee(1, '山田太郎'));
        $this->assertTrue($department->valid());
    }

    public function testAddEmployee()
    {
        $department = new DepartmentIterator('Test Department');
        $result = $department->addEmployee($this->testEmployee);

        $this->assertEquals($department, $result);
        $this->assertThat(
            $department,
            $this->contains($this->testEmployee)
        );
    }

    public function testIsIteratable()
    {
        $department = new DepartmentIterator('Test Department');
        $this->assertTrue(is_iterable($department));
    }
}