<?php

namespace Engine\Core\Router;

class Router
{
    /**
     * @var Routes collection
     */
    private $routes;

    private $host;
    private $namedRoutes;

    /**
     * Router constructor.
     * @param $host
     */
    public function __construct($host)
    {
        $this->host = $host;
    }

    /**
     * @param RouteCollection $collection
     */
    public function register(RouteCollection $collection)
    {
        $this->routes = $collection->all();

        foreach ($this->routes as $routes) {
            if (!empty($routes->getName())) {
                $this->namedRoutes[$routes->getName()] = $routes;
            }
        }
    }

    /**
     * @param $uri
     * @param $method
     * @return bool
     */
    public function matchCurrentRequest($uri, $method)
    {
        if ($pos = strpos($uri, "?") != false) {
            $uri = substr($uri, 0, $pos);
        }

        return $this->match($uri, $method);
    }


    /**
     * @param $requestUri
     * @param $requestMethod
     * @return bool
     */
    private function match($requestUri, $requestMethod)
    {
        if (substr($requestUri, -1) !== "/") {
            $requestUri .= "/";
        }

        foreach ($this->routes as $route) {
            if (!in_array($requestMethod, (array)$route->getMethod(), true)) {
                continue;
            }
            $pattern = "#^" . $route->getUri() . "$#";
            if (!preg_match($pattern, $requestUri)) {
                continue;
            }

            if (strpos($route->getUri(), "(") !== false) {
                if (preg_match($pattern, $requestUri, $parameters)) {
                    $route->setParameters($this->processParameters($parameters));
                }
            }

            return $route;
        }

        return false;
    }

    /**
     * @param $parameters
     * @return mixed
     */
    private function processParameters($parameters)
    {
        foreach ($parameters as $key => $value) {

            if (is_int($key)) {
                unset($parameters[$key]);
            }
        }
        return $parameters;
    }

    /**
     * @param $findName
     * @return bool
     */
    public function findRoutes($findName)
    {
        foreach ($this->namedRoutes as $name => $route) {
            if ($name === $findName) {
                return $route;
            }
        }
        return false;
    }

    /**
     * @param $config
     * @return bool
     */
    public function parseConfig($config)
    {
        $collection = new RouteCollection();

        foreach ($config as $name => $route) {
            $collection->attachRoute(new Route($route['uri'], array(
                'controller' => $route['controller'],
                'method' => $route['method'],
                'group' => $route['group'],
                'name' => $name
            )));
        }

        $this->register($collection);
    }


}