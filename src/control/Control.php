<?php
namespace App\control;

class Control{
    private $container;
    
    function __construct($container)
    {
        $this->container = $container;        
    }
    
    public function __get($property)
    {
        if($this->container->{$property}){
            return $this->container->{$property};
        }    
    }    
}