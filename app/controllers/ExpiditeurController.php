<?php

namespace App\Controllers;

use Core\View;

class ExpiditeurController{
    public function dashboard(){
        return View::make('expediteur/dashbord');
    }
}