<?php
namespace Character\Controller;

use acl\Core\View\View;
use Character\Mapper\CharacterMapper;


class Mission
{
    public $layout ='dashboard';
    protected $request;
    
    public function __construct($request)
    {
        $this->request = $request;    
    }
    public function indexAction()
    {
        $mapper = new CharacterMapper();
        $historics = $mapper->getHistorics();
        $content = View::renderView("../modules/Character/views/crud/select.phtml",
            array('historics'=>$historics)
        );
        return $content;
    }
    public function showAction()
    {
        if($_POST)
        {
           
            $mapper = new CharacterMapper();
            $Character = $mapper->setCharacter($_POST);
            header("Location: /");
        }
        else
        {
            
            $mapper = new CharacterMapper();
            $historic = $mapper->getHistoric($this->request['params']['idcharacter']);

            $content = View::renderView("../modules/Character/views/missions/select.phtml",
                    array('historic'=>$historic)
            );
            
        }
        return $content;
    }
    public function insertAction()
    {
        if($_POST)
        {
            $mapper = new CharacterMapper();
            $mission = $mapper->setMission($_POST);
            
            
            
            header("Location: /");
        }
        else
        {
            $content = View::renderView("../modules/Character/views/missions/insert.phtml");
        }
        return $content;
    }
    
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
        if ($_POST)
        {
            $mapper = new CharacterMapper();
            $character = $mapper->putCharacter($_POST['idcharacter'],$_POST);
            header("Location: /");
        }
        else
        {

            $mapper = new CharacterMapper();
            $character = $mapper->getMission($this->request['params']['idhistoric']);
            $content = View::renderView("../modules/Character/views/missions/update.phtml",
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
            $content = View::renderView("../modules/Character/views/missions/delete.phtml",
                array('character'=>$character)
            );
        }
        return $content;
    }
}