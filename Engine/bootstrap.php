<?php


use Engine\DI\DI;
use Cms\Cms;

try {

    $di = new DI();

    $services = require_once __DIR__ . '/Config/Service.php';
    foreach ($services as $service) {
        $provider = new $service($di);
        $provider->init();
    }

    $cms = new Cms();
    $cms->run($di);

} catch (Exception $e) {
    $e->getMessage();
    die();
}