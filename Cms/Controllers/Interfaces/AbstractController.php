<?php

namespace Cms\Controllers\Interfaces;

abstract class AbstractController
{

    protected $di;
    protected $model;
    protected $view;

    public function __construct($di)
    {
        $this->di = $di;
        $this->model = $this->loadModel();
        $this->view = $this->di->getService('view');
    }

    private function loadModel(){
        preg_match('#(\w+)(Controller)$#', get_class($this), $className);

        $path = '\\Cms\\Models\\' . $className[1];
        return new $path($this->di);
    }





}