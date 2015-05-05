<?php
namespace Character\Mapper;

use acl\Core\Config;

class CharacterMapper
{
   private $resource = 'Character';
    public $adapter;
    
    public function getTimelines()
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        

        
        $timelines = $gateway->getTimelines();

        $entity = new TimelineEntity();
        
        foreach ($timelines as $key => $timeline)
        {
            $entity->hydrate($timeline);
            $arrayobjects[$key] = $entity;//new \ArrayObject($entity,\ArrayObject::STD_PROP_LIST);
        }

        foreach ($arrayobjects as $key => $arrayobject)
        {
            $arrayTimelines[$key] = $entity->extract($arrayobject);
        }
   
        return $timelines;
    }
    
    public function getTimeline($id)
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $timelines = $gateway->getTimeline($id);
        $entity = new TimelineEntity();

        $entity->hydrate($timelines);

        $timelines = $entity->extract($entity);

        return $timelines;
    }
    
    public function setTimeline($data)
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $timelines = $gateway->setTimeline($data);
        
        return $timelines;
    }
    
    public function putTimeline($id, $data)
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $timelines = $gateway->putTimeline($id, $data);
        
        return $timelines;
    }
    
    public function deleteTimeline($id)
    {
        $gatewayName = "Character\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        $timelines = $gateway->deleteTimeline($id);
        
        return $timelines;
    }
    
    
    
}