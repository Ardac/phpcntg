<?php
namespace acl\Core\View;

class View
{
    static public function renderView($view, $viewData = null)
    {
        ob_start();
        include ($view);
        $content = ob_get_contents();
        ob_end_clean();
    
        return $content;
    }    
}
