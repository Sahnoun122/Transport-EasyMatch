<?php

namespace App\Models;
use App\Models\User;
use App\Exceptions\InputException;

class Admin extends User{
    public function __construct($id = null, $fname = null, $lname = null, $email = null, $password = null, $created_at = null, $updated_at = null){
        parent::__construct($id, $fname, $lname, $email, $password, 'admin',$created_at, $updated_at);
    }
}