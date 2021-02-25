<?php
/**
 * Created by PhpStorm.
 * User: mish
 * Date: 2019-02-01
 * Time: 20:32
 */

namespace App\App;



class Request
{

    private $get_params = [];
    private $post_params = [];
    private $method;
    private $files;
    private $url;
    private $uri;
    private $params = [];

    public function __construct()
    {
        $this->get_params = $_GET ?? [];
        $this->post_params = $_POST ?? [];
        $this->params = $_REQUEST;
        $this->uri = $_SERVER['REQUEST_URI'];
    }


    public function getParams(): array
    {
        return $this->params;
    }



    public function getGetParams(): array
    {
        return $this->get_params;
    }


    public function getPostParams(): array
    {
        return $this->post_params;
    }


    public function getMethod()
    {
        return $this->method;
    }

    public function getFiles()
    {
        return $this->files;
    }


    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }


}