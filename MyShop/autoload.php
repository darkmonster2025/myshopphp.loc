<?php
set_include_path('C:\xampp\htdocs\\');
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});