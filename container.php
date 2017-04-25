<?php

include('routeService.php');
include('request.php');

class Container
{
    private $request;

    //新建Request实例，以便注入
    public function __construct()
    {
        $this->request = new Request();
        $this->request->init();
    }

    public function delegate()
    {
        //获得路由表
        $routeList = Route::getRouteList();

        //遍历路由表，寻找匹配控制器和方法
        foreach($routeList as $url => $controllerAndFunction) {
            $arr = explode('@', $controllerAndFunction);
            $controller = $arr[0];
            $function = $arr[1];

            //url匹配
            if ($url == $this->request->getURL()) {

                //引入控制器
                include($controller.'.php');

                //php反射分析参数列表
                $reflectMethod = new ReflectionMethod($controller, $function);
                $parameters = $reflectMethod->getParameters();


                //无需参数
                if(count($parameters) < 1)
                {
                    $reflectMethod->invoke(new $controller());
                }

                //需要注入Request
                else
                {
                    $aParameter = $parameters[0];
                    $aParameter->getClass()->name == 'Request';
                    $reflectMethod->invokeArgs(new $controller(), array($this->request));
                }
            }
        }
        
    }

}

?>