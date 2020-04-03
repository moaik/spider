<?php

class DbFactory
{
	public static $instance = [];

	final private function __construct(){}
	final private function __clone(){}

	public static function createInstance($store)
	{
		require_once __DIR__ .'/' . ucwords($store) . '.php';

		$class = ucwords($store);
		if (!in_array($store, self::$instance)) {
			self::$instance[$store] = new $class;
		}

		return self::$instance[$store];
	}
}