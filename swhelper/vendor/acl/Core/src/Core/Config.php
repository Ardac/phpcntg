<?php
namespace acl\Core;

class Config
{
    static $config;
    
    static public function readConfig($config)
    {
    
        $globalFile = ROOT_PATH.'/configs/global.php';
        $localFile = ROOT_PATH.'/configs/local.php';
    
        if(!file_exists($globalFile))
            die("Config not found");
    
        if(file_exists($localFile))
        {
            $global = include $globalFile;
            $local = include $localFile;
            self::$config = array_merge($global, $local);
            return self::$config;
        }
        else
        {
            self::$config = include $globalFile;
            return self::$config;
        }
            
            
    
    }
}

