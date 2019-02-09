<?php

namespace Test\Singleton;

use App\Singleton\Singleton;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    public function testConstructIsNotPublic()
    {
        $reflection = new \ReflectionClass('App\Singleton\Singleton');
        $constructor = $reflection->getConstructor();
        $this->assertFalse($constructor->isPublic());
    }

    public function testGetInstanceReturnsSameInstance()
    {
        $instance_1 = Singleton::getInstance();
        $instance_2 = Singleton::getInstance();

        $this->assertTrue($instance_1 === $instance_2);
    }

    public function testCloneThrowsException()
    {
        $instance_1 = Singleton::getInstance();

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Clone is not allowed: App\Singleton\Singleton');
        $instance_2 = clone $instance_1;
    }
}