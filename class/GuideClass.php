<?php

class GuideClass
{
	public function run()
	{
		echo __FUNCTION__ . PHP_EOL;
	}

	public function first()
	{
		echo __FUNCTION__ . PHP_EOL;
	}

	public function second($argv1, $argv2)
	{
		echo __FUNCTION__ . PHP_EOL;
	}

	public function __call($name, $arguments)
	{
		echo "{$name} method not exists!";
	}
}