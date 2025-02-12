<?php

namespace App\Models;
use App\Exceptions\InputException;

class Evaluation{
       private $id;
       private $rate;
       private $comment;
       private  $createdAt;


        public function __construct($id , $rate , $comment , $createdAt){
            $this->setId($id);
            $this->setRate($rate);
            $this->setComment($comment);
            $this->createdAt = $createdAt;
        }

       //getter
        public function getId(){
            return $this->id;
        }

        public function getRate(){
            return $this->rate;
        }

        public function getComment(){
            return $this->comment;
        }

        public function getCreatedAt(){
            return $this->createdAt;
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

    public function setRate($rate){
        if($rate != null){
            if(!is_int($rate))
                throw new InputException("Rating must be an integer.");
            if($rate <= 0)
                throw new InputException("Rating must be a positive number greater than 0 !");
        }
        $this->rate = $rate;
    }


    public function setComment($comment){
        if($comment != null){
            if(!is_string($comment))
                throw new InputException("Comment must be a non-string.");
            if( strlen($comment) < 3)
                throw new InputException("Comment should contain at least 3 characters !");
        }
        
        $this->comment = $comment;
    }
}
    
