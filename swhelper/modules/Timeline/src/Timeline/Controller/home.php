<?php
namespace Timeline\Controller;

use acl\Core\View\View;
use Timeline\Mapper\TimelineMapper;
// use Timeline\Entity\TimelineEntity;
//use Timeline\Entity\TimelineEntities;


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
        $mapper = new TimelineMapper();
        $characters = $mapper->getCharacters();

        $content = View::renderView("../modules/Timeline/views/crud/select.phtml",
            array('characters'=>$characters)
        );
        return $content;
    }
    
    public function selectAction()
    {
        echo "esto es select";
        
        $mapper = new TimelineMapper();
        $timelines = $mapper->getTimelines();
        $content = View::renderView("../modules/Timeline/views/crud/select.phtml",
             array('timelines'=>$timelines)
        );
        return $content;
    }
    
    public function insertAction()
    {
        echo "esto es insert";
        if($_POST)
        {
            $mapper = new TimelineMapper();
            $timeline = $mapper->setTimeline($_POST);
            header("Location: /timeline/select");
        }
        else
        {
            $content = View::renderView("../modules/Timeline/views/crud/insert.phtml");
        }
        return $content;
    }
    
    public function updateAction()
    {
        echo "esto es update";
        if ($_POST)
        {
            $mapper = new TimelineMapper();
            $timeline = $mapper->putTimeline($_POST['idtimeline'],$_POST);
            header("Location: /timeline/select");
        }
        else
        {
            $mapper = new TimelineMapper();
            $timeline = $mapper->getTimeline($this->request['params']['idtimeline']);
          
//             echo "<pre>";
//             print_r("aqui ");
//             echo "</pre>";
//             die;
            //timeslines ser� un objeto
            
            
            $content = View::renderView("../modules/Timeline/views/crud/update.phtml",
                array('fieldsLine'=>$timeline)
            );
        }
        return $content;
    }
    
    public function deleteAction()
    {
        echo "esto es delete";
        if ($_POST)
        {
            if ($_POST['borrar'] === "SI")
            {
                $mapper = new TimelineMapper();
                $timelines = $mapper->deleteTimeline($_POST['idtimeline']);                
            }
            header("Location: /timeline/select");
        }
        else
        {
            $mapper = new TimelineMapper();
            $timeline = $mapper->getTimeline($this->request['params']['idtimeline']);
      

//             echo "<pre>";
//             print_r($timeline);
//             echo "</pre>";
            
            
//             die;
            
            
            $content = View::renderView("../modules/Timeline/views/crud/delete.phtml",
                array('timeline'=>$timeline)
            );
        }
        return $content;
    }
}