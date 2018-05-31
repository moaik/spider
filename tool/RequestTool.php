<?php

class RequestTool
{
    static $headers = [];

    public function get($url)
    {
        $arrHeaders = [
            'Accept-Language:zh-Hans-CN;q=1',
            'Accept-Encoding:gzip, deflate',
            'Connection:keep-alive',
        ];

        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        // set User-Agent
        curl_setopt($ch, CURLOPT_USERAGENT, 'qMotor/5.2.12 (iPhone; iOS 11.3.1; Scale/2.00)');
        // set Header
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeaders);
        // curl_exec 执行的结果不自动打印出来
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // execute
        $result = curl_exec($ch);
        // close curl resource to free up system resources
        curl_close($ch);
        $ch = NULL;

        return $result;
    }

    public function post()
    {

    }

    public function setHeader($headers)
    {
        self::$headers = $headers;
    }
}