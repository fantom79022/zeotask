<?php

class Cache
{
    /**
     * @var Redis
     */
    private $redis;

    public function startRedis($host = 'localhost') {
        $redis = new Redis();
        $redis->connect('localhost');
        $this->redis = $redis;
    }

    /**
     * @param string $originalToken
     * @param string $result
     */
    public function saveToCache($originalToken, $result) {
        $this->redis->set($originalToken, $result);
    }

    /**
     * @param string $token
     * @return bool|string
     */
    public function getFromCache($token) {

        return $this->redis->get($token);
    }
    public function closeRedis() {
        $this->redis->close();
    }
}