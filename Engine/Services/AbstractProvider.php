<?php

namespace Engine\Services;

abstract class AbstractProvider
{
    protected $di;

    public function __construct($di)
    {
        $this->di = $di;
    }

    abstract public function init();

}
