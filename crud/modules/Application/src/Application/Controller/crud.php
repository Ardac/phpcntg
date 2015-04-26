<?php

include (VENDOR_PATH."/acl/Core/src/Core/View/renderView.php");
include (APPLICATION_PATH."/src/Application/Model/db/getUsers.php");
include (APPLICATION_PATH."/src/Application/Model/db/getUser.php");
include (APPLICATION_PATH."/src/Application/Model/db/setUser.php");
include (APPLICATION_PATH."/src/Application/Model/db/deleteUser.php");
include (APPLICATION_PATH."/src/Application/Model/db/patchUser.php");
include (APPLICATION_PATH."/src/Application/Model/db/putUser.php");

switch($request['action'])
{
    case 'index':
    case 'select':
        $users = getUsers($config['database']);        
        $content = renderView("../modules/Application/views/crud/select.phtml",
                              array('users'=>$users)
                    );   
    break;

    case 'insert':        
        if($_POST)
        {
            $users = setUser($_POST,$config['database']);
            header("Location: /crud/select");
        }
        else 
        {
//           $users = setUser($config['database']);
           $content = renderView("../modules/Application/views/crud/insert.phtml");
         }
    break;

    case 'update':
        if ($_POST)
        {
            $user = putUser($_POST['iduser'], $_POST,$config['database']);
            header("Location: /crud/select");
        }
        else
        {      
            $user = getUser($request['params']['id'],$config['database']);
            $content = renderView("../modules/Application/views/crud/update.phtml",
                              array('fieldsLine'=>$user)
                    );
        }
    break;

    case 'delete':
        if ($_POST)
        {
            if ($_POST['borrar'] === "SI")
            {
                deleteUser($_POST['id'],$config['database']);
            }               
            header("Location: /crud/select");    
        }
        else
        {     
            $user = getUser($request['params']['id'],$config['database']);
            $content = renderView("../modules/Application/views/crud/delete.phtml",
                array('user'=>$user)
            );
        }
    break;
}

// $content = "kaka";

include ("../modules/Application/views/layouts/dashboard.phtml");