<?php

namespace Cms\Models;

abstract class AbstractModel
{
    protected $di;

    public function __construct($di)
    {
        $this->di = $di;
    }

    /**
     * @return
     * @internal param mixed $db
     */
    protected function getDb()
    {
        return $this->di->getService('database');
    }



}