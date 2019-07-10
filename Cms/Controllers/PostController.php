<?php
/**
 * Created by PhpStorm.
 * User: Rafail
 * Date: 08.06.2019
 * Time: 22:58
 */

namespace Cms\Controllers\Interfaces;


class PostController extends AbstractController implements ResourceController
{
    public function index()
    {
        $data = $this->model->showAll();
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