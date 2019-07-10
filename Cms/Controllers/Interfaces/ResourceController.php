<?php
/**
 * Created by PhpStorm.
 * User: Rafail
 * Date: 10.06.2019
 * Time: 15:26
 */

namespace Cms\Controllers\Interfaces;

interface ResourceController
{
    public function index();
    public function info($id);
    public function add($data = array());
    public function edit($id, $data = array());
    public function delete($id);
}