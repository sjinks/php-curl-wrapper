<?php

namespace WildWolf;

interface CurlMultiWrapperInterface
{
    public function addHandle(CurlWrapperInterface $h);
    public function removeHandle(CurlWrapperInterface $h);
    public function setOption($key, $value);
    public function error($error);
    public function errno();
    public function execute(&$still_running);
    public function select($timeout = 1.0);
    public function getContent(CurlWrapperInterface $h);
    public function readInfo(int &$msgs_in_queue = null);
}
