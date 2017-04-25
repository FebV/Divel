<?php

class testController
{

    //laravel风格控制器


    public function test()
    {
        echo 'hi';
    }

    public function request(Request $request)
    {
        echo $request->input('name');
    }
}

