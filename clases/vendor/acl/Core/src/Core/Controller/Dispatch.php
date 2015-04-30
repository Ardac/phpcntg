<?php
namespace acl\Core\Controller;

class Dispatch
{
    
    static public function dispatcher($request)
    {
        $controllerName = 'Application\\Controller\\'.$request['controller'];
        $actionName = $request['action'];

        $controller = new $controllerName();
        $view = $controller->$actionName();
        
        $layout = $controller->layout;
        
        $html = self::twoStep($layout, $view);
        
        return $html;
    }
    
    static public function twoStep($layout, $content)
    {
        ob_start();
            include (RPATH."/modules/Application/views/layouts/".$layout.".phtml");
            $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
  
    
}