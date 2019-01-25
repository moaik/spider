<?php

require __DIR__ . '/../tool/ToolFactory.php';
require __DIR__ . '/../store/StoreFactory.php';

class TestClass
{
	public function run()
	{
        $http = ToolFactory::createToolInstance('Request');
        $requestUrl = 'http://api.okayapi.com/?s=App.Hello.World';
        $result = $http->get($requestUrl);

        var_dump($result);
    }

    public function foo($p1, $p2, $p3)
    {
    	echo "The input parameters are: $p1, $p2, $p3" . PHP_EOL;
    }

}