<?php

namespace Engine\DI;

class DI
{
    public $di = array();

    /**
     * @param $serviceName
     * @return array
     */
    public function getService($serviceName)
    {
        return isset($this->di[$serviceName]) ? $this->di[$serviceName] : null;
    }

    /**
     * @param $serviceName
     * @param $service
     */
    public function setService($serviceName, $service)
    {
        $this->di[$serviceName] = $service;
    }


}