<?php

namespace Engine\Services\Database;

use Engine\Services\AbstractProvider;
use Engine\Core\Database\Connection;

class Provider extends AbstractProvider
{
    private $serviceName = "database";

    public function init()
    {
        $database = new Connection();

        $this->di->setService($this->serviceName, $database);
    }
}