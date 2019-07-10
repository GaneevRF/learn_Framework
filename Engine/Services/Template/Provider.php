<?php

namespace Engine\Services\Template;

use Engine\Services\AbstractProvider;
use Engine\Core\Template\View;

class Provider extends AbstractProvider
{

    private $serviceName = 'view';

    public function init()
    {
        $view = new View();

        $this->di->setService($this->serviceName, $view);
    }
}