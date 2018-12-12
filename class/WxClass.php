<?php

require __DIR__ . '/../tool/ToolFactory.php';

class LikeClass
{
    const WECHAT = [
        [
            'pass_ticket' => 'y8pgR99dFghZLJwy9N3f0z7LDvigJ%25252Bt%25252FE%25252BXT5IljiQ0qavghiC0z5epp89Xg3Zw5',
            'appmsg_token' => '986_31jsRhn80pbwWiufc6SKGMbpExSQRiZuPPbHh3SqyWile9pxPYL7FHtw50r9gCKjzUj52wAjhhPWUC3j',
            'cookie' => 'wxtokenkey=777; devicetype=iOS12.1.1; lang=zh_CN; pass_ticket=9FhePbPOX7d2MsYDRxsIo/O3GAjGA5kRL6IYxvquB5ezGIeU23znrVUdmE6/ngkX; rewardsn=; version=1607042f; wap_sid2=CKiyz/EGElxsNGRPSVlpcy1pNWlrSUVMdy1PN1FhVGtLcXV3cHNzU2t1YVMzN01kRC0tTVlQWnJldWkxdzRHTjdTeE1tNVJhTUJkVnlLLWlnUXFNTElqUGZZRlZUdG9EQUFBfjCf8r7gBTgNQAE=; wxuin=1848891688',
        ],
        [
            'pass_ticket' => 'YqnQ5izc%25252F%25252F8ajjbX024ry9BHaT4oGoQ%25252F8l7jng7fT2s%25253D',
            'appmsg_token' => '986_1GCFTZsjh5QltOUI6-h0XOSLWuXTGKzKKy_K9XWPnozn20naHx8MajjI6_8~',
            'cookie' => 'wxtokenkey=777; rewardsn=; devicetype=iOS12.1.1; lang=zh_CN; pass_ticket=YqnQ5izc//8ajjbX024ry9BHaT4oGoQ/8l7jng7fT2s=; version=1607042f; wap_sid2=COn6eRJcbFBrMWdrV3ZqZ01JVUFzWlNrSDBCdmk2cksyVDZiaHFlbXp4SUpIeWp4NGdnMHJ3TWh6OTktMjJRTjM3UzQ4OUl6X3VUV2FWV3VwY0c3QUNmd1F0NE5vREFBQX4w4e++4AU4DUAB; wxuin=1998185'
        ]
    ];

    public function run()
    {
        $winning = [1, 4, 8, 16, 25];

        $http = ToolFactory::createToolInstance('Request');

        $url = 'https://mp.weixin.qq.com/mp/appmsg_comment?action=getcomment&scene=0&__biz=MzI0MDU3MzgxMw==&appmsgid=2247490232&idx=1&comment_id=584538398681825281&offset=0&limit=100&uin=777&key=777&pass_ticket=y8pgR99dFghZLJwy9N3f0z7LDvigJ%25252Bt%25252FE%25252BXT5IljiQ0qavghiC0z5epp89Xg3Zw5&wxtoken=777&devicetype=iOS12.1.1&clientversion=1607042f&appmsg_token=986_UAS%252Fd%252FHhF%252BgPBsBFc6SKGMbpExSQRiZuPPbHh4-34QupODajGRvpoRQTdElrviIPAm2E6qu-PkeuOuwF&x5=0&f=json';

        $cookie = 'devicetype=iOS12.1.1; lang=zh_CN; pass_ticket=y8pgR99dFghZLJwy9N3f0z7LDvigJ+t/E+XT5IljiQ0qavghiC0z5epp89Xg3Zw5; rewardsn=; version=1607042f; wap_sid2=CKiyz/EGElwwa1BTZVZaQnIwSFNZeV9UX0RGbTA3WWhRbjJQZ2ZOcTF0UE5mOXlFRE9TaFlvb1dmNFRjdUpnMG9WcEZ1R2Y4OVJUSUhOT2c4bkwtZ1N6TFNQaWxITm9EQUFBfjCltr7gBTgNQAE=; wxtokenkey=777; wxuin=1848891688';
        $result = $http->get($url, $cookie);
        
        $arrRes = json_decode($result, true);

        $arrData = $arrRes['elected_comment'];

        $arrNew = [];
        foreach ($arrData as $key => $val) {
            $arrNew[$key]['name'] = $val['nick_name']; 
            $arrNew[$key]['count'] = $val['like_num']; 
        }

        // foreach ($arrNew as $key => $val) {
        //     if ('皮格鲁斯' == $val['name']) {
        //         $count = $key + 1;
        //         if (! in_array($count, $winning)) {
        //             echo '你的评论目前不在获奖列表里!' . PHP_EOL;
        //             echo '开始启动点赞脚本！' . PHP_EOL;
        //             foreach (self::WECHAT as $val) {
        //                 $this->isLike($val['pass_ticket'], $val['appmsg_token'], $val['cookie'], 1);
        //             }
        //         }
        //     }
        // }
    }

    /**
     * 点赞/取消点赞
     * 1 点赞 0 取消点赞
     */ 
    public function isLike($passTicket, $appmsgToken, $cookie, $islike = 1)
    {
        $url = "https://mp.weixin.qq.com/mp/appmsg_comment?action=likecomment&uin=777&key=777&pass_ticket=$passTicket&wxtoken=777&devicetype=iOS12.1.1&clientversion=1607042f&appmsg_token=$appmsgToken&x5=0&f=json";

        $http = ToolFactory::createToolInstance('Request');
        $postData = [
            'like' => $islike,
            // 公众号唯一标识
            '__biz' => 'MzI0MDU3MzgxMw==',
            'appmsgid' => '2247490232',
            // 评论ID
            'comment_id' => '584538398681825281',
            // 文章ID
            'content_id' => '2131672460339183621',
            'item_show_type' => 0,
            'scene' => 0
        ];

        $result = $http->post($url, $postData, $cookie);

        var_dump($result);
    }
}