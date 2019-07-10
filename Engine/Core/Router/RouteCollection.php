<?php

namespace Engine\Core\Router;


class RouteCollection extends \SplObjectStorage
{
    public function attachRoute(Route $route)
    {
        parent::attach($route, null);
    }

    public function all()
    {
        $temp = array();
        foreach ($this as $route) {
            $temp[] = $route;
        }
        return $temp;
    }
}