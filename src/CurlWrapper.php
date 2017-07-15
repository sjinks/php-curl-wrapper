<?php

namespace WildWolf;

class CurlWrapper implements CurlWrapperInterface
{
    private $ch;

    public function __construct(string $url = null)
    {
        $this->ch = curl_init($url);
        if (!is_resource($this->ch)) {
            throw new \Exception();
        }
    }

    public function __destruct()
    {
        curl_close($this->ch);
    }

    public function setOption($key, $value)
    {
        return curl_setopt($this->ch, $key, $value);
    }

    public function setOptions(array $opts)
    {
        return curl_setopt_array($this->ch, $opts);
    }

    public function execute()
    {
        return curl_exec($this->ch);
    }

    public function reset()
    {
        return curl_reset($this->ch);
    }

    public function info(int $key = null)
    {
        return null === $key ? curl_getinfo($this->ch) : curl_getinfo($this->ch, $key);
    }

    public function error()
    {
        return curl_error($this->ch);
    }

    public function errno()
    {
        return curl_errno($this->ch);
    }
}
