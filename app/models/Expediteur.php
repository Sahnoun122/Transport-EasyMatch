<?php

namespace App\Models;

use App\Models\User;

class Expediteur extends User
{
    public function __construct($id = null, $fname = null, $lname = null, $email = null, $password = null, $role = 'expediteur', $created_at = null, $updated_at = null)
    {
        parent::__construct($id , $fname , $lname , $email , $password , $role , $created_at , $updated_at );
    }
}
