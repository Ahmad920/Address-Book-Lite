<?php
namespace App\Core;

class Route 
{
    private $get=[];
    private $post=[];

    public static function make()
    {
        $router = new self;
        return $router;
    }

    public function get($key,$value)
    {
        $this->get[$key] = $value;
        return $this;
    }

    public function post($key,$value)
    {
        $this->post[$key] = $value;
        return $this;
    }

    public function resolve($uri,$method)
    {
        if(array_key_exists($uri,$this->{$method}))
        {
        $action = $this->{$method}[$uri];
        $this->callAction(...$action);
        }
        else {
            echo "page not found";
        }
    }

    public function callAction($controller,$action)
    {
        $controller = new $controller;
        $controller->{$action}();
    }
}