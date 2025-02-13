<?php

namespace App\Middlewares;

use Core\IMiddleware;

class AuthMiddleware implements IMiddleware{
    public function handle($params = null){
        if(!isset($_SESSION['user_id'])){
            header('Location: /auth/login');
            exit;
        }

        if($params != null){
            if($_SESSION['user_role'] != $params){
                if($_SESSION['user_role'] == 'admin')
                    header('Location: /admin/dashboard');
                else if($_SESSION['user_role'] == 'conducteur')
                    header('Location: /conducteur/dashboard');
                else
                    header('Location: /expiditeur/history');
                exit;
            }
        }
    }
}