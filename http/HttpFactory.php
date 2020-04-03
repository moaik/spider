<?php

class HttpFactory
{
    public static $instance = [];

    final private function __construct(){}
    final private function __clone(){}

    public static function createToolInstance($tool)
    {
        require_once __DIR__ .'/' . ucwords($tool) . '.php';

        $class = ucwords($tool);
        if (!in_array($tool, self::$instance)) {
            self::$instance[$tool] = new $class;
        }

        return self::$instance[$tool];
    }
}