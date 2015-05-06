<?php
namespace Character\Mapper;

use acl\Core\Config;

class CharacterMapper
{
   private $resource = 'Character';
    public $adapter;
    
//     public function getTimelines()
//     {
//         $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
//         $gateway = new $gatewayName(Config::$config['database']);
//         $timelines = $gateway->getTimelines();

//         $entity = new TimelineEntity();
        
//         foreach ($timelines as $key => $timeline)
//         {
//             $entity->hydrate($timeline);
//             $arrayobjects[$key] = $entity;//new \ArrayObject($entity,\ArrayObject::STD_PROP_LIST);
//         }

//         foreach ($arrayobjects as $key => $arrayobject)
//         {
//             $arrayTimelines[$key] = $entity->extract($arrayobject);
//         }
   
//         return $timelines;
//     }
    
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
    
    public function deleteTimeline($id)
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        $timelines = $gateway->deleteTimeline($id);
        
        return $timelines;
    }
    public function getClass()
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $classes = $gateway->getClass();
    
             
        return $classes;
    }
}