<?php

require __DIR__ . '/../tool/ToolFactory.php';
require __DIR__ . '/../store/StoreFactory.php';

class TestClass
{
	public function run()
	{
        $http = ToolFactory::createToolInstance('Request');

        $postData = [
            'address' => 'postmaster@appdatachart.com',
            'subject' => 'test',
            'body' => 'test'
        ];
        $result = $http->post('http://msgsender.service.moext.io/mail', $postData);
        return $result;
    }
}