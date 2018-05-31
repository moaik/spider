<?php

class StoreFactory
{
	public static $instance = [];

	final private function __construct(){}
	final private function __clone(){}

	public static function createStoreInstance($store)
	{
		require_once __DIR__ .'/' . ucwords($store) . 'Store.php';

		$class = ucwords($store) . 'Store';
		if (!in_array($store, self::$instance)) {
			self::$instance[$store] = new $class;
		}

		return self::$instance[$store];
	}
}