<?php

namespace  App\Models;

use  App\Exceptions\InputException;

class Type
{
    private  int  $id;
    private String  $name;
    private $errors = [];
    public function  __construct($id = null, $name = null)
    {
        try {
            $this->setId($id);
            $this->setName($name);
        } catch (InputException $e) {
            $this->errors[] = $e->getMessage();
        }
    }
    public function setId($id)
    {
        if (!is_int($id) || $id <= 0) {
            throw new InputException("Invalid ID");
        }
        $this->id = $id;
    }
    public function  setName($name)
    {
        if ($name != null)
            if (!preg_match('/^[a-zA-Z\s]{3,50}$/', $name))
                throw new InputException("Invalid Name");
        $this->name = $name;
    }
    public function  getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getErrors(){
        $errors = $this->errors;
        $this->errors = [];
        return $errors;
    }
}
