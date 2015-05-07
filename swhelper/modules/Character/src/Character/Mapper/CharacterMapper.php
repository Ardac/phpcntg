<?php
namespace Character\Mapper;

use acl\Core\Config;

class CharacterMapper
{
    private $resource = 'Character';
    public $adapter;
    
    public function getCharacter($idcharacter)
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $character = $gateway->getCharacter($idcharacter);
        return $character;
    }
    
    public function setCharacter($data)
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $character = $gateway->setCharacter($data);
        
        return $character;
    }
    
    public function putCharacter($id, $data)
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $character = $gateway->putCharacter($id, $data);
        
        return $character;
    }
    
    public function deleteCharacter($id)
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        $character = $gateway->deleteCharacter($id);
        
        return $character;
    }
    public function getClass()
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $classes = $gateway->getClass();

        return $classes;
    }
    
    public function getHistoric($id)
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $Historic = $gateway->getHistoric($id);
    
        return $Historic;
    }
    
    public function getMissions()
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $Missions = $gateway->getMissions();
    
        return $Missions;
    }
    public function getCharacters()
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $characters = $gateway->getCharacters();
        return $characters;
    }
    public function setMission($data)
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $mission = $gateway->setMission($data);
    
        return $mission;
    }
    public function getHistorics()
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $Historics = $gateway->getHistorics();
    
        return $Historics;
    }
}