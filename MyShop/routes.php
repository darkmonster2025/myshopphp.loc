<?php

use MyShop\Router;
use MyShop\Controllers\UserController;
use MyShop\Controllers\ProductController;
use MyShop\Controllers\AuthController;

$router = new Router();


$router->addRoute('/index', UserController::class, 'index');
$router->addRoute('/home', AuthController::class, 'home');
$router->addRoute('/product/list', ProductController::class, 'list');
$router->addRoute('/product/add', ProductController::class, 'add');
$router->addRoute('/createProduct', ProductController::class, 'createProduct');
$router->addRoute('/product/edit', ProductController::class, 'edit');
$router->addRoute('/product/update', ProductController::class, 'update');
$router->addRoute('/product/delete', ProductController::class, 'delete');
$router->addRoute('/login', AuthController::class, 'login');
$router->addRoute('/loginSubmit', AuthController::class, 'loginSubmit');
$router->addRoute('/registration', AuthController::class, 'registration');
$router->addRoute('/registrationSubmit', AuthController::class, 'registrationSubmit');
$router->addRoute('/logout', AuthController::class, 'logout');
$router->addRoute('/profile', AuthController::class, 'profile');
$router->addRoute('/updateSubmit', AuthController::class, 'updateSubmit');
