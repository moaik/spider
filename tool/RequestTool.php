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
        // set request method
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        // set User-Agent
        curl_setopt($ch, CURLOPT_USERAGENT, 'qMotor/5.2.12 (iPhone; iOS 11.3.1; Scale/2.00)');
        // set Header
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeaders);
        // set timeout
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        // curl_exec 执行的结果不自动打印出来
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // set proxy
        // curl_setopt($ch, CURLOPT_PROXY, '114.237.64.6:52444');

        // curl_setopt($ch, CURLOPT_HEADER, true);
        // curl_setopt($ch, CURLOPT_NOBODY, true);
        // execute
        $result = curl_exec($ch);
        // $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (false === $result) {
            return curl_error($ch) . curl_errno($ch);
        }

        // close curl resource to free up system resources
        curl_close($ch);
        $ch = NULL;

        return $result;
    }

    public function post($url, $data)
    {
        $ch = curl_init();
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        // set request method
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        // set Header
        curl_setopt($ch, CURLOPT_HTTPHEADER, self::$headers);
        // curl_exec 执行的结果不自动打印出来
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // execute
        $result = curl_exec($ch);

        if (false === $result) {
            return curl_error($ch) . curl_errno($ch);
        }

        // close curl resource to free up system resources
        curl_close($ch);
        $ch = NULL;

        return $result;
    }

    public function setHeader($headers)
    {
        self::$headers = $headers;
    }
}