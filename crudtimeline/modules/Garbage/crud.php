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
        $data = getUsers($config['database']);  
        $content = renderView("../modules/Application/views/crud/select.phtml",
                              array('data'=>$data)
                    );   
    break;

    case 'insert':        
        if($_POST)
        {              
            $data = setUser($_POST, $config['database']);
            header("Location: /crud/select");
        }
        else 
        {
            $content = renderView("../modules/Application/views/crud/insert.phtml",
                                  array('configDatabase'=>$config['database']));
        }
    break;

    case 'update':
        if ($_POST)
        {
            $data = putUser($_POST['idtimeline'], $_POST,$config['database']);
            header("Location: /crud/select");
        }
        else
        {                       
          //  $user = getUser($request['params']['id']);
            $data = getUser($config['database'], $request['params']['id']);
                        
            $content = renderView("../modules/Application/views/crud/update.phtml",
                              array('fieldsLine'=>$data)
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
            $data = getUser($config['database'], $request['params']['id']);
            $content = renderView("../modules/Application/views/crud/delete.phtml",
                array('data'=>$data)
            );
        }
    break;
}

// $content = "kaka";

include ("../modules/Application/views/layouts/dashboard.phtml");