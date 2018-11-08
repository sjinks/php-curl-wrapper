<?php

namespace WildWolf;

interface CurlWrapperInterface
{
    public static function create(string $url = null);
    public function setOption($key, $value);
    public function setOptions(array $opts);
    public function execute();
    public function reset();
    public function info(int $key = null);
    public function error();
    public function errno();
    public function handle();
    public function close();
}
