<?php

namespace MyShop\Controllers;

use MyShop\Controller;
use MyShop\Models\User;

   


class AuthController extends Controller {
    private $products;

    public function login() {
        $this->render('user/login');
    }

    public function profile() {
        
        $user = new User();
        $id = $_SESSION['userid'];
        $users = $user->getUser($id);

        $this->render('user/profile',['user' => $users]);
    }

    public function home() { 
      
        $this->render('user/home');
    }

    public function logout() { 
        session_destroy();
        header('Location: http://myshop.loc/login');
        exit;
    }

    public function updateSubmit(){
        $name= $_POST['name'];
        $lastname= $_POST['lastname'];
        $password= $_POST['password'];
        $errorMessages = [];

        if(!isset($_POST['name']) || strlen($_POST['name']) < 3){
         $errorMessages['nameEror'] = 'name must be more then 3 leters!';
        }
        if(!isset($_POST['lastname']) || strlen($_POST['lastname']) < 4){
         $errorMessages['lastnameEror'] = 'lastname must be more then 4 leters!';
        }
        if(!isset($_POST['password']) || strlen($password)<6 || strlen($password)>40){
         $errorMessages['passwordEror'] = 'password is not correct!';
        }

        if(empty($errorMessages)){
            $user = new User();
            $updateUser = $user->UserUpdate(['name'=>$name,'lastname'=>$lastname,'password'=>md5($password),'id'=>$_SESSION['userid']]);
            if($updateUser){
               header("Location: http://myshop.loc/profile");
               exit;
            }
            $errorMessages['general'] = 'cannot update something went wrong!';
        }
        $this->render('user/profile', ['errors' => $errorMessages]);
    }

    public function loginSubmit(){
        $usernameORemail= $_POST['usernameORemail'];
        $password = $_POST['password'];
        $errorMessages = []; 

        if(!isset($_POST['usernameORemail']) || strlen($_POST['usernameORemail']) < 3){
         $errorMessages['usernameORemailEror'] = 'username or email is not correct!';
        }
        if(!isset($_POST['password']) || strlen($password)<6 || strlen($password)>40){
         $errorMessages['passwordEror'] = 'password is not correct!';
        }

        if(empty($errorMessages)){
            $user = new User();
            $loginComfirm = $user->UserLogin(['usernameORemail'=>$usernameORemail,'password'=>md5($password)]);
            if($loginComfirm){
               $_SESSION['userid']=$loginComfirm['id'];
               header("Location: http://myshop.loc/home");
               exit;
            }
            $errorMessages['general'] = 'username or password is invalid';
        }
        $this->render('user/login', ['errors' => $errorMessages]);
    }

    public function registration() {
        $users = [];
        $this->render('user/registration', ['users' => $users]);
    }

    public function registrationSubmit(){
        $name= $_POST['name'];
        $lastname= $_POST['lastname'];
        $username= $_POST['username'];
        $email= $_POST['email'];
        $password= $_POST['password'];
        $passwordComfirm= $_POST['passwordComfirm'];
        $errorMessages = [];

        if(!isset($_POST['name']) || strlen($_POST['name']) < 3){
         $errorMessages['nameEror'] = 'name must be more then 3 leters!';
        }
        if(!isset($_POST['lastname']) || strlen($_POST['lastname']) < 4){
         $errorMessages['lastnameEror'] = 'lastname must be more then 4 leters!';
        }
        if(!isset($_POST['username']) || strlen($_POST['username']) < 6){
         $errorMessages['usernameEror'] = 'username must be more then 6 leters!';
        }
        if(!isset($_POST['email']) || !preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $_POST['email'])){
         $errorMessages['emailEror'] = 'email is not valid!';
        }
        if(!isset($_POST['password']) || strlen($_POST['password']) < 8){
         $errorMessages['passwordEror'] = 'password must be more then 8 leters!';
        }
        if($_POST['password'] !== $_POST['passwordComfirm']){
         $errorMessages['passwordComfirmEror'] = 'passwords are different!';
        }

        if(empty($errorMessages)){ 
        $user = new User();
        $registrationComfrim = $user->UserRegistration(['name'=>$name, 'lastname'=>$lastname,'username'=>$username, 'email'=>$email, 'password'=>md5($password) ]);
            if($registrationComfrim){
                header("Location: http://myshop.loc/login");
                exit;
            }
            $errorMessages['general'] = 'Error!!! Try later';
        }
        $this->render('user/registration', ['errors' => $errorMessages]);
    }
}