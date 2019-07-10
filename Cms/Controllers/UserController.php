<?php
namespace Cms\Controllers;

use Cms\Controllers\Interfaces\AbstractController;
use Cms\Controllers\Interfaces\ResourceController;

class UserController extends AbstractController implements ResourceController
{

    public function index()
    {
        $data = $this->model->showAll();

        return $this->view->render('index', $data);
    }

    public function info($id)
    {
        $data = $this->model->show($id);
    }

    public function add($data = array())
    {
        $id = $this->model->add($data);

        var_dump($id);

    }

    public function edit($id, $data = array())
    {
        $this->model->edit($id, $data);
    }

    public function delete($id)
    {
        $this->model->delete($id);
    }
}