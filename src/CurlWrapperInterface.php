<?php

namespace WildWolf;

interface CurlWrapperInterface
{
    public function setOption($key, $value);
    public function setOptions(array $opts);
    public function execute();
    public function reset();
    public function info(int $key = null);
    public function error();
    public function errno();
}
