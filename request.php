<?php

class Request
{
    private $url;
    private $method;
    private $query;


    //加载请求类中包括的内容
    public function init()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = str_replace('/DependencyInject', '', $url);
        $arr = explode('?', $url);
        $this->url = $arr[0];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->query = $_GET;
    }

    //获得参数
    public function input($name)
    {
        $value = $this->query[$name];
        return $value;
    }

    //获取URL
    public function getURL()
    {
        return $this->url;
    }

}