<?php
namespace Timeline\Controller;

use acl\Core\View\View;
use Timeline\Mapper\TimelineMapper;

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
}