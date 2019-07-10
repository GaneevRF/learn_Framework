<?php

namespace Cms;

use Engine\Helpers\Helpers;
use Engine\Core\Config;

class Cms
{
    /**
     * @var object DI
     */
    private $di;

    /**
     * @param $di
     */
    public function run($di)
    {
        $this->di = $di;

        $this->database();
        $this->view();
        $this->router(Helpers::GET_URI(), Helpers::GET_METHOD());

    }

    /**
     * @param $uri
     * @param $method
     * @return mixed
     */
    public function router($uri, $method)
    {
        $config = Config::loadFromFile('router');
        $routerObj = $this->di->getService('router');

        $routerObj->parseConfig($config);
        $route = $routerObj->matchCurrentRequest($uri, $method);

        if (empty($route)) {
            $route = $routerObj->findRoutes('404Page');
        }
        list($controllerName, $action) = $route->getController();
        $parameters = $route->getParameters();
        $group = $route->getGroup();

        if (empty($group)) {
            $path = 'Cms\\Controllers\\' . $controllerName;
        } else {
            $path = 'Cms\\Controllers\\' . strtoupper($group) . '\\' . $controllerName;
        }

        call_user_func_array([new $path($this->di), $action], $parameters);

    }

    public function database()
    {
        $config = Config::loadFromFile('database');
        $dbObj = $this->di->getService('database');
        $dbObj->connect($config);
    }

    public function view(){
        $viewObj = $this->di->getService('view');
        $viewObj->init();
    }
}