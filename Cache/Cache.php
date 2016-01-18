<?php

class Cache
{
    const PATH = 'Cache/cache.txt';

    /**
     * @var cache
     */
    private $cache;

    /**
     * @param string $path
     */
    public function startCaching($path = self::PATH) {
        $this->cache = fopen($path, 'a+');
    }

    /**
     * @param string $originalToken
     * @param string $result
     */
    public function saveToCache($originalToken, $result) {
        $cachedToken = str_replace("\n", ' ', $originalToken) . PHP_EOL;
        $cachedResult = str_replace("\n", ' ', $result) . PHP_EOL;
        fwrite($this->cache, $cachedToken);
        fwrite($this->cache, $cachedResult);
    }

    /**
     * @param string $token
     * @return bool|string
     */
    public function getFromCache($token) {
        $searchToken = str_replace("\n", ' ', $token) . PHP_EOL;
        $cacheArray = file(self::PATH);
        $i = 0;
        $last_key = key( array_slice($cacheArray, -1, 1, TRUE));
        while ($i < $last_key) {
            if ($searchToken == $cacheArray[$i]) {
                return $cacheArray[$i+1];
            }
            $i+=2;
        }
        return false;
    }

    public function endCaching() {
        fclose($this->cache);
    }

    public function invalidation() {
        file_put_contents(self::PATH, '');
    }
}