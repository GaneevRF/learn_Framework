<?php

namespace Engine\Helpers;

class Helpers
{
    public static function GET_METHOD(){
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function GET_URI(){
        return $_SERVER['REQUEST_URI'];
    }


}