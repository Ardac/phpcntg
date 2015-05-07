<?php
namespace Character\Controller;

use acl\Core\View\View;
use Character\Mapper\CharacterMapper;


class Home
{
    public $layout ='dashboard';
    protected $request;
    
    public function __construct($request)
    {
        $this->request = $request;    
    }
    
    public function indexAction()
    {
        if($_POST)
        {
           
            $mapper = new CharacterMapper();
            $Character = $mapper->setCharacter($_POST);
            header("Location: /");
        }
        else
        {
            $content = View::renderView("../modules/Character/views/crud/create.phtml");
        }


        
        
        return $content;
    }
//     public function imperioAction()
//     {
//         echo "esto es select";
        
//         $mapper = new CharacterMapper();
//         $timelines = $mapper->getTimelines();
//         $content = View::renderView("../modules/Timeline/views/crud/select.phtml",
//              array('timelines'=>$timelines)
//         );
//         return $content;
//     }
    
//     public function createAction()
//     {
//         echo "esto es insert";
//         if($_POST)
//         {
            
//             $mapper = new CharacterMapper();
//             $timeline = $mapper->setTimeline($_POST);
//             header("Location: /timeline/select");
//         }
//         else
//         {
//             $content = View::renderView("../modules/Timeline/views/crud/insert.phtml");
//         }
//         return $content;
//     }
    
    public function updateAction()
    {
        //echo "esto es update";
        if ($_POST)
        {
            $mapper = new CharacterMapper();
            $character = $mapper->putCharacter($_POST['idcharacter'],$_POST);
            header("Location: /");
        }
        else
        {

            $mapper = new CharacterMapper();
            $character = $mapper->getCharacter($this->request['params']['idcharacter']);
            $content = View::renderView("../modules/Character/views/crud/update.phtml",
                array('fieldsLine'=>$character)
            );
        }
        return $content;
    }
    
    public function deleteAction()
    {
        if ($_POST)
        {
            if ($_POST['borrar'] === "SI")
            {
                $mapper = new CharacterMapper();
                $character = $mapper->deleteCharacter($_POST['idcharacter']);                
            }
            header("Location: /");
        }
        else
        {
            $mapper = new CharacterMapper();
            $character = $mapper->getCharacter($this->request['params']['idcharacter']);
            $content = View::renderView("../modules/Character/views/crud/delete.phtml",
                array('character'=>$character)
            );
        }
        return $content;
    }
}