<?php
require 'container.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);

//入口文件

//新建容器实例

$app = new Container();

//使用容器委托对应路由执行方法

$app->delegate();
