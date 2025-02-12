<?php

namespace app\models;

use app\models\User;

class Expediteur extends  app\models\User
{
    public function __construct()
    {
        $this->setRole('expediteur');
    }
}
