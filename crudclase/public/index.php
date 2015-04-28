<?php

define ("APPLICATION_PATH", "../modules/Application");
define ("VENDOR_PATH", "../vendor");
define ("ROOT_PATH", "../");

include (VENDOR_PATH."/acl/Core/src/Core/Controller/Helper/parseUrl.php");
include (VENDOR_PATH."/acl/Core/src/Core/Config.php");
include ('../configs/application.route.config.php');

$config = config::readConfig('../configs/application.config.php');
$controller = Router::route();
$request = Url::parseUrl($controller,$_SERVER['REQUEST_URI']);

echo "<pre>request: ";
print_r($request);
echo "</pre>";

die("aqui");




switch($request['controller'])
{
    case 'index':
    case 'users':
        include ("../modules/Application/src/Application/Controller/users.php");
    break;
    
    case 'home':
        include ("../modules/Application/src/Application/Controller/home.php");
    break;
    
    case 'crud':
        include ("../modules/Application/src/Application/Controller/crud.php");
    break;
    
}