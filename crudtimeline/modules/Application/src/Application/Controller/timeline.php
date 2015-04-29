<?php
include (VENDOR_PATH."/acl/Core/src/Core/View/renderView.php");
include (APPLICATION_PATH."/src/Application/Model/db/getUsers.php");
include (APPLICATION_PATH."/src/Application/Model/db/getUser.php");
include (APPLICATION_PATH."/src/Application/Model/db/setUser.php");
include (APPLICATION_PATH."/src/Application/Model/db/deleteUser.php");
include (APPLICATION_PATH."/src/Application/Model/db/putUser.php");


switch($request['action'])
{
    case 'index':
    case 'select':
        $data = getUsers($config['database']);  
        $content = renderView(APPLICATION_PATH."/views/timeline/select.phtml",
                              array('data'=>$data)
                    );   
    break;

    case 'insert':        
        if($_POST)
        {              
            $data = setUser($_POST, $config['database']);
            header("Location: /timeline/select");
        }
        else 
        {
            $content = renderView(APPLICATION_PATH."/views/timeline/insert.phtml",
                                  array('configDatabase'=>$config['database']));
        }
    break;

    case 'update':
        if ($_POST)
        {
            $data = putUser($_POST['idtimeline'], $_POST,$config['database']);
            header("Location: /timeline/select");
        }
        else
        {                       
          //  $user = getUser($request['params']['id']);
            $data = getUser($config['database'], $request['params']['id']);
                        
            $content = renderView(APPLICATION_PATH."/views/timeline/update.phtml",
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
            header("Location: /timeline/select");    
        }
        else
        {     
            $data = getUser($config['database'], $request['params']['id']);
            $content = renderView(APPLICATION_PATH."/views/timeline/delete.phtml",
                array('data'=>$data)
            );
        }
    break;
}

// $content = "kaka";

include (APPLICATION_PATH."/views/layouts/dashboard.phtml");