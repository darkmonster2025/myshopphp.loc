<?php

namespace MyShop;

class Router {
    protected $publicRoutes = ['/index','/login','/loginSubmit','/registration','/registrationSubmit'];

    public function addRoute($route, $controller, $action) {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }
    
    public function dispatch($uri) {
        parse_str(parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY), $params);

    if(!isset($_SESSION['userid']) && !in_array($uri, $this->publicRoutes)){
        header('Location: http://myshop.loc/index');
        exit; 
    }elseif(isset($_SESSION['userid']) && in_array($uri, $this->publicRoutes)){
        header('Location: http://myshop.loc/home');
        exit; 
    }
    else{
        if (array_key_exists($uri, $this->routes)) {
            $controller = $this->routes[$uri]['controller'];
            $action = $this->routes[$uri]['action'];
            $controller = new $controller();
            if($params){
                $controller->$action($params);
            }else{
                $controller->$action();
            } 
        } else {
            throw new \Exception("No route found for URI: $uri");
        }
    }
    }
}
    