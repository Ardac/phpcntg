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
   
        return $characters;
    }
    
    public function getTimeline($id)
    {
        $gatewayName = "Timeline\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $timelines = $gateway->getTimeline($id);
        $entity = new TimelineEntity();

        $entity->hydrate($timelines);

        $timelines = $entity->extract($entity);

        return $timelines;
    }
    
    public function setTimeline($data)
    {
        $gatewayName = "Timeline\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $timelines = $gateway->setTimeline($data);
        
        return $timelines;
    }
    
    public function putTimeline($id, $data)
    {
        $gatewayName = "Timeline\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $timelines = $gateway->putTimeline($id, $data);
        
        return $timelines;
    }
    
    public function deleteTimeline($id)
    {
        $gatewayName = "Timeline\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        $timelines = $gateway->deleteTimeline($id);
        
        return $timelines;
    }
    
    
    
}