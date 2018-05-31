<?php

namespace code\system;

class Route{

    private $route=[];

    public function __construct()
    {
        $route=include_once APPPATH.'route.php';
        $this->route=$route;
    }


    public function autoRoute(){
        return $this->route;
    }
}