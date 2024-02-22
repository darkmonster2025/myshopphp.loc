<?php

session_start();

require 'autoload.php';
require 'routes.php';

$uri = $_SERVER['REQUEST_URI'];

$router->dispatch(parse_url($uri, PHP_URL_PATH));
    