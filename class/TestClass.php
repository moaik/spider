<?php

require __DIR__ . '/../lib/VCard.php';
require __DIR__ . '/../db/DbFactory.php';
require __DIR__ . '/../http/HttpFactory.php';

class TestClass
{
    // php start.php test run
	public function run()
	{
        $db = DbFactory::createInstance('Mysql');
        $sql = "select * from profiles limit 5";
        $data = $db->select($sql);
        var_dump($data);
        $http = HttpFactory::createInstance('Request');
        $requestUrl = 'https://tool.bitefu.net/shouji/?mobile=18600364447';
        $result = $http->get($requestUrl);

        var_dump(json_decode($result, true));
    }

    public function test()
    {
        $db = DbFactory::createInstance('Mysql');
        $sql = "select nickname,mobile from guide_user where mobile!='' limit 10";
        $data = $db->select($sql);
        foreach ($data as $value) {
            VCard::make($value['nickname'], $value['mobile']);
        }
    }

    public function foo($p1, $p2, $p3)
    {
    	echo "The input parameters are: $p1, $p2, $p3" . PHP_EOL;
    }

}