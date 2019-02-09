<?php

namespace App\Singleton;

class Singleton
{
    private static $singleton;

    private function __construct()
    {
    }

    public static function getInstance()//: Singleton
    {
        if (self::$singleton == null) {
            self::$singleton = new Singleton();
        }

        return self::$singleton;
    }

    final function __clone()
    {
        throw new \Exception(sprintf('Clone is not allowed: %s', get_class($this)));
    }
}