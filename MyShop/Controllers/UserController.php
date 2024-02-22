<?php

namespace MyShop\Controllers;

use MyShop\Controller;
use MyShop\Models\User;

class UserController extends Controller {
    public function index() {
        $this->render('/index');
    }

}