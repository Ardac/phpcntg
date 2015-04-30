<?php
namespace Application\Mapper;

use acl\Core\Config;

class UserMapper
{
    private $resource = 'Timeline';
    public $adapter;
    
    public function getUsers()
    {
        
        
        $gatewayName = "Application\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
        
        $users = $gateway->getUsers();
        
        return $users;
    }
    public function setUser($post)
    {
    
        $gatewayName = "Application\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $users = $gateway->setUser($post);
    
        return $users;
    } 
    public function getUser($id)
    {
    
        $gatewayName = "Application\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $user = $gateway->getUser($id);
    
        return $user;
    }
    public function putUser($id,$data)
    {
    
    
        $gatewayName = "Application\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $users = $gateway->putUser($id,$data);
    
        return $users;
    }
    public function deleteUser($id)
    {
    
    
        $gatewayName = "Application\\Gateways\\".Config::$config['adapter'].$this->resource;
        $gateway = new $gatewayName(Config::$config['database']);
    
        $user = $gateway->deleteUser($id);
    
        return $user;
    }
    
}