<?php

namespace MyShop\Models;

use PDO;

class BaseModel {
    public $user='root';
    public $pass='';

    public function dbh() {
     return new PDO('mysql:host=localhost;dbname=arammyshop',$this->user,$this->pass);
    }
}