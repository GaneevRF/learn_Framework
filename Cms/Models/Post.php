<?php

namespace Cms\Models;

class Post extends AbstractModel implements ResourceModel
{

    public function show($id)
    {
        $sql = "SELECT * FROM `posts` WHERE `id` = :id";
        $data = ['id' => $id];

        return $this->getDb()->getRow($sql, $data);
    }

    public function showAll()
    {
        $sql = "SELECT * FROM `posts`";

        return $this->getDb()->getAll($sql);
    }

    public function add($data = array())
    {
        $sql = "INSERT INTO `posts` (`username`, `password`, `email`) VALUE (:name, :pass, :email)";
        $data = [];

        return $this->getDb()->add($sql, $data);
    }

    public function edit($id, $data = array())
    {
        $sql = "UPDATE `posts` SET `username` = :name, `password` = :pass, `email` = :email WHERE `id` = :id";
        $data = ['id' => $id];
        return $this->getDb()->set($sql, $data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `posts` WHERE `id` = :id";
        $data = ['id' => $id];
        return $this->getDb()->set($sql);
    }
}