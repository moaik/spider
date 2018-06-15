<?php

class ProxyTool
{
    public function getIp()
    {
        $homePage = file_get_contents('http://www.xicidaili.com/nn');

        $arr = [];
        $reg = '#<td>\s*.*<\/td>#';

        preg_match_all($reg, $homePage, $arr);

        $arrChunk = array_chunk($arr[0], 5);

        $arrIp = [];
        foreach ($arrChunk as $key => $value) {
            $arrIp[] = str_replace(['<td>', '</td>'], '', $value[0] . ':' . $value[1]);
        }

        // echo json_encode($arrIp);
    }
}