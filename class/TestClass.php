<?php

require __DIR__ . '/../db/DbFactory.php';
require __DIR__ . '/../http/HttpFactory.php';

class TestClass
{
    // php start.php test run
	public function run()
	{
        $http = HttpFactory::createToolInstance('Request');
        $requestUrl = 'https://tool.bitefu.net/shouji/?mobile=18600364447';
        $result = $http->get($requestUrl);

        var_dump(json_decode($result, true));
    }

    public function foo($p1, $p2, $p3)
    {
    	echo "The input parameters are: $p1, $p2, $p3" . PHP_EOL;
    }

}