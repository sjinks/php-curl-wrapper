<?php

namespace WildWolf;

class CurlMultiWrapper implements CurlMultiWrapperInterface
{
    private $mh;

    public function __construct()
    {
        $this->mh = curl_multi_init();
        if (!is_resource($this->mh)) {
            throw new \Exception();
        }
    }

    public function __destruct()
    {
        if (is_resource($this->mh)) {
            curl_multi_close($this->mh);
        }
    }

    public function addHandle(CurlWrapperInterface $h)
    {
        return curl_multi_add_handle($this->mh, $h->handle());
    }

    public function removeHandle(CurlWrapperInterface $h)
    {
        return curl_multi_remove_handle($this->mh, $h->handle());
    }

    public function setOption($key, $value)
    {
        return curl_multi_setopt($this->mh, $key, $value);
    }

    public function error($error)
    {
        return curl_multi_strerror($error);
    }

    public function errno()
    {
        return curl_multi_errno($this->mh);
    }

    public function execute(&$still_running)
    {
        return curl_multi_exec($this->mh, $still_running);
    }

    public function select($timeout = 1.0)
    {
        return curl_multi_select($this->mh, $timeout);
    }

    public function getContent(CurlWrapperInterface $h)
    {
        return curl_multi_getcontent($h->handle());
    }

    public function readInfo(int &$msgs_in_queue = null)
    {
        return curl_multi_info_read($this->mh, $msgs_in_queue);
    }
}
