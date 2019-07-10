<?php

namespace Engine\Core\Template;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class View
{
    public $twig;

    public function init(){
        $loader = new FilesystemLoader(__DIR__ . '/../../../Cms/Views/');

        $this->twig = new Environment($loader, array(
            'cache' => __DIR__ . '/../../../Views/cache',
        ));
    }

    public function render($view, $data = array()){
        echo $this->twig->render('index.php', array());
    }





}