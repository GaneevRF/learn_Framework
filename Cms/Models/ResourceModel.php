<?php
/**
 * Created by PhpStorm.
 * User: Rafail
 * Date: 10.06.2019
 * Time: 15:14
 */

namespace Cms\Models;

interface ResourceModel
{
    public function show($id);
    public function showAll();
    public function add($params = array());
    public function edit($id, $params = array());
    public function delete($id);
}