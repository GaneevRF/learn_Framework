<?php

namespace Engine\Core\Router;

class Route
{
    private $uri;
    private $method;
    private $controller;
    private $parameters = array();
    private $group;
    private $name;

    private $patterns = [
        'int' => '[0-9]+',
    ];

    /**
     * Route constructor.
     * @param $uri
     * @param array $data
     */
    public function __construct($uri, array $data)
    {
        $this->uri = $this->setUri($uri);
        $this->method = isset($data['method']) ? $this->setMethod($data['method']) : "GET";
        $this->controller = $this->setController($data['controller']);
        $this->group = $data['group'];
        $this->name = $data['name'];
    }

    /**
     * @param $uri
     * @return string
     */
    public function setUri($uri)
    {
        if (substr($uri, -1) !== "/") {
            $uri .= "/";
        }

        if (strpos($uri, "(") !== false) {
            return preg_replace_callback("#\((\w+):(\w+)\)#", array($this, 'replaceRoute'), $uri);
        }
        return $uri;
    }

    public function replaceRoute($match)
    {
        $name = $match[1];
        $pattern = $match[2];

        $pat = '(?<' . $name . '>' . strtr($pattern, $this->patterns) . ')';
        return $pat;
    }

    /**
     * @param $method
     * @return array|string
     */
    public function setMethod($method)
    {
        $method = strtoupper($method);

        if (strpos($method, "|") !== false) {
            $method = explode("|", $method);
        }

        if ($method === "*") {
            $method = ["GET", "POST", "PUT", "DELETE", "HEAD"];
        }
        return $method;
    }

    /**
     * @param $controller
     * @return array|string
     */
    public function setController($controller)
    {
        if (empty($controller)) {
            $controller = "MainController:index";
        }
        if (strpos($controller, ":") !== false) {
            $controller = explode(":", $controller);
        }
        return $controller;
    }

    /**
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return array|string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array|string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


}