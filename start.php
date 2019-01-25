<?php

/**
*	Usage:
*	php start.php class method
*	php start.php class method argv1 argv2...
*
*/

// remove the first member in $argv. It's file name.
array_shift($argv);
if (is_array($argv) && count($argv) > 1) {
	// include class file
	require_once(dirname(__FILE__) . '/class/' . ucwords($argv[0]) . 'Class.php');
	$class = ucwords($argv[0]) . 'Class';

	$object = new $class;
	$method = $argv[1];
	$count = count($argv);

	if (2 == $count) {
		call_user_func([$object, $method]);
	} else {
		unset($argv[0]);
		unset($argv[1]);
		call_user_func_array([$object, $method], $argv);			
	}
} else {
	echo 'Missing necessary parameters!' . PHP_EOL;
}


