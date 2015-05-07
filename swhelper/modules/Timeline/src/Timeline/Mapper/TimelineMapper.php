<?php
namespace Timeline\Mapper;

use acl\Core\Config;
use Timeline\Entity\TimelineEntity;

class TimelineMapper
{
    private $resource = 'Timeline';
    public $adapter;
    
    public function getCharacters()
    {
        $gatewayName = "Timeline\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        $characters = $gateway->getCharacters();
  
        return $characters;
    }
    
}