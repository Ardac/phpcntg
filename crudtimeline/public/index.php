<?php

define ("APPLICATION_PATH", "../modules/Application");
define ("VENDOR_PATH", "../vendor");
define ("ROOT_PATH", "../");

include ("../vendor/acl/Core/src/Core/readConfig.php");

$config = readConfig('../configs/application.config.php');

// echo "<pre>config: ";
// print_r($config);
// echo "</pre>";

include ("../vendor/acl/Core/src/Core/Controller/Helper/parseUrl.php");


$request = parseUrl($_SERVER['REQUEST_URI']);

switch($request['controller'])
{
//     case 'index':
//     case 'users':
//         include ("../modules/Garbage/users.php");
//     break;
    
//     case 'home':
//         include ("../modules/Garbage/home.php");
//     break;
    
//     case 'crud':
//         include ("../modules/Garbage/crud.php");
//     break;
    case 'timeline':
       
        include ("../modules/Application/src/Application/Controller/timeline.php");
        break;
    
}