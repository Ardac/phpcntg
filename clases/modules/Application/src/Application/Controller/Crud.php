<?php
namespace Application\Controller;

use Application\Mapper\UserMapper;
use acl\Core\View\View;
use acl\Core\Controller\Helper\Router;

class Crud
{
    public $layout = 'dashboard';
    
    public function index()
    {
        
    }
    
    public function select()
    {
       // echo "esto es select";
  
        $mapper = new UserMapper();
        $users = $mapper->getUsers();
        
        $content = View::renderView("../modules/Application/views/crud/select.phtml",
            array('users'=>$users)
        );
        
        return $content;
    }
    
    public function insert()
    {
        if($_POST)
        {
            $mapper = new UserMapper();
            $mapper->setUser($_POST);

            header("Location: /crud/select");
        }
        else
        {
            $content = View::renderView("../modules/Application/views/crud/insert.phtml");

        }

        return $content;
    }
    
    public function update()
    {
        if ($_POST)
        {
            $mapper = new UserMapper();
            
            $mapper->putUser($_POST['idtimeline'], $_POST);
            header("Location: /crud/select");
        }
        else
        {
            $mapper = new UserMapper();
            
            $routes = include ("../configs/routes.config.php");
            $request = Router::readRoute($_SERVER['REQUEST_URI'],$routes);
            $user = $mapper->getUser($request['params']['id']);

            $content =  View::renderView("../modules/Application/views/crud/update.phtml",
                array('fieldsLine'=>$user)
            );
            return $content;
        }
    }
    
    public function delete()
    {
        if ($_POST)
        {
            if ($_POST['borrar'] === "SI")
            {
                $mapper = new UserMapper();
                $user = $mapper->deleteUser($_POST['id']);
            }
            header("Location: /crud/select");
        }
        else
        {
            $mapper = new UserMapper();
            
            $routes = include ("../configs/routes.config.php");
            $request = Router::readRoute($_SERVER['REQUEST_URI'],$routes);
            $user = $mapper->getUser($request['params']['id']);


            $content = View::renderView("../modules/Application/views/crud/delete.phtml",
                array('user'=>$user['0'])
            );

            return $content;
        }
    }
    
   
    
    
}


// include ("../modules/Application/views/layouts/dashboard.phtml");













