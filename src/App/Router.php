<?php
/**
 * Created by PhpStorm.
 * User: mish
 * Date: 2019-02-01
 * Time: 20:52
 */

namespace App\App;


use App\Application;

class Router
{
    const ROUTES_PATH = __DIR__.'/../../routes.php';
    const CONTROLLER_PREFIX = 'App\App\Controller\\';
    private $action = 'index';
    private $controller = 'Main';
    private $request;
    private $routes = [];


    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->request = Application::request();

        //animast
        $this->routes = include self::ROUTES_PATH;

    }

    public function generateResponse()
    {
        $this->parseUri();
        $fullControllerName = self::CONTROLLER_PREFIX.$this->controller.'Controller';
        if(class_exists($fullControllerName)) {
            $controller = new $fullControllerName();
            if(method_exists($controller, $this->action)) {
                $action = $this->action;
                $controller->$action();
                return;
            }

        }
        exit("404");
    }

    private function parseUri() {
        $uri = trim($this->request->getUri(), '/');

        $parts = explode('/', $uri);
        switch (count($parts)) {
            case 1:
                if(!empty($parts[0])) {
                    $this->controller =  ucfirst(strtolower($parts[0]));
                }
                break;
            case 2:
                if(!empty($parts[0])) {
                    $this->controller = ucfirst(strtolower($parts[0]));
                }
                if(!empty($parts[1])) {
                    $this->action =  ucfirst(strtolower($parts[1]));
                }
                break;
            default:
                if(!empty($parts[0])) {
                    $this->controller = ucfirst(strtolower($parts[0]));
                }
                if(!empty($parts[1])) {
                    $this->action = ucfirst(strtolower($parts[1]));
                }
                break;

        }
    }
}