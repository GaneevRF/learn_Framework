<?php

namespace Engine\Services\Router;

use Engine\Services\AbstractProvider;
use Engine\Core\Router\Router;


class Provider extends AbstractProvider
{
    private $serviceName = 'router';
    private $config;

    public function init()
    {
        if(file_exists("../../Config/Router.php")){
            $this->config = require_once "../../Config/Router.php";
        }

        $router = new Router($this->config["host"]);

        $this->di->setService($this->serviceName, $router);
    }
}