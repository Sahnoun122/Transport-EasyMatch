<?php

namespace App\Models;

use App\Exceptions\InputException;
use App\Services\EvaluationService;

class Evaluation
{
    private $id;
    private $rate;
    private $comment;
    private  $createdAt;
    protected $errors = [];


    public function __construct($id, $rate, $comment, $createdAt)
    {
        try {
            $this->setId($id);
            $this->setRate($rate);
            $this->setComment($comment);
            $this->createdAt = $createdAt;
        } catch (InputException $e) {
            $this->errors[] = $e->getMessage();
        }
    }

    //getter
    public function getId(){return $this->id;}
    public function getRate(){return $this->rate;}
    public function getComment(){return $this->comment;}
    public function getCreatedAt(){return $this->createdAt;}

    //setter

    public function setId($id)
    {
        if ($id != null) {
            if (!is_int($id))
                throw new InputException("ID must be an integer.");
            if ($id <= 0)
                throw new InputException("Id must be a positive number greater than 0 !");
        }
        $this->id = $id;
    }

    public function setRate($rate)
    {
        if ($rate != null) {
            if (!is_int($rate))
                throw new InputException("Rating must be an integer.");
            if ($rate <= 0)
                throw new InputException("Rating must be a positive number greater than 0 !");
        }
        $this->rate = $rate;
    }


    public function setComment($comment)
    {
        if ($comment != null) {
            if (!is_string($comment))
                throw new InputException("Comment must be a non-string.");
            if (strlen($comment) < 3)
                throw new InputException("Comment should contain at least 3 characters !");
        }

        $this->comment = $comment;
    }

    public function getErrors()
    {
        $errors = $this->errors;
        $this->errors = [];
        return $errors;
    }

    public function displayEvaluation() {
        return [
            'id' => $this->id,
            'rate' => $this->rate,
            'comment' => $this->comment,
            'createdAt' => $this->createdAt->format('d F Y'),
        ];
    }
}
