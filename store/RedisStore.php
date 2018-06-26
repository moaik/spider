<?php

class RedisStore
{
    private $redis;

    public function __construct()
    {
        $this->redis = new Redis();
        $this->redis->connect('127.0.0.1', 6379);
    }

    public function leftList($key, $value)
    {
        if (is_array($value)) {
            foreach ($value as $val) {
                $this->redis->lPush($key, $val);
            }
        } else {
            $this->redis->lPush($key, $value);
        }
    }

    public function getHead($key)
    {
        return $this->redis->lPop($key);
    }
}