<?php

namespace Engine\Core;

use InvalidArgumentException;

class Config
{
    public static function loadFromFile($name){
        $filePath =  __DIR__ . '/../Config/'. ucwords($name) . '.php';

        if(!(is_file($filePath))){
            throw new InvalidArgumentException(sprintf('The file %s not exists!', $filePath));
        }

        $file = require_once $filePath;
        return $file;
    }
}