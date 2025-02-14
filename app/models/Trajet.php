<?php
namespace App\Models;
use App\Exceptions\InputException;

class Trajet{
    private $id;
    private $city;
    private $order;
    protected $errors = [];


    public function __construct($id ,$city , $order){
     try{ $this->setCity($city);
      $this->setOrder($order);
      $this->setId($id);
    }catch(InputException $e){
        $this->errors[] = $e->getMessage();
    }
    }
//getter
    public function getId(){
        return $this->id;
    }

    public function getCity(){
        return $this->city;
    }

    public function getOrder(){
        return $this->order;
    }

//setter
   public function setId($id) {
        if($id != null){
            if(!is_int($id))
                throw new InputException("ID must be an integer.");
            if($id <= 0)
                throw new InputException("Id must be a positive number greater than 0 !");
        }
        $this->id = $id;
    }

    public function setCity($city){
        if (!is_string($city)) {
            throw new InputException("City must be a non-string.");
        }
        if ( empty($city)) {
            throw new InputException("City must be a non-empty string.");
        }
        $this->city = $city;
    }

    public function setOrder($order){
        if (!is_numeric($order) ) {
            throw new InputException("The order must be a number.");
        }
        if ($order <= 0) {
            throw new InputException("The order must be a positive number.");
        }
        $this->order = $order;
    }

    public function getErrors(){
        $errors = $this->errors;
        $this->errors = [];
        return $errors;
    }

}
