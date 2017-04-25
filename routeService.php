<?php

include 'route.php';

class Route
{

    private static $routeList = [];


    //路由服务

    //建立路由表
    public static function get($url, $controllerAndFunction)
    {
        self::$routeList[$url] = $controllerAndFunction;
    }

    //获得路由表
    public static function getRouteList()
    {
        return self::$routeList;
    }


}

?>