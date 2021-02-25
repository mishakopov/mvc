<?php
/**
 * Created by PhpStorm.
 * User: mish
 * Date: 2019-02-01
 * Time: 20:25
 */

namespace App;


use App\App\Request;

class Application
{
    private static $request;

    public function run():void
    {
        self::$request = new App\Request();
        $router = new App\Router();
        $router->generateResponse();

    }

    public static function request():Request {
        return self::$request;
    }
}