<?php

namespace  app\models;

class Type
{
    private  int  $id;
    private String  $name;
    public function  __construct() {}
    public function  setId($id)
    {
        if (is_int($id) && $id > 0)
            $this->id = $id;
    }
    public function  setName($name)
    {
        if (preg_match('/^[a-zA-Z\s]{3,50}$/', $name)) {
            $this->name = $name;
        }
    }
    public function  getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
}
