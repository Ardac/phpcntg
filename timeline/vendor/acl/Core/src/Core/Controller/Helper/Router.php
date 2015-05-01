<?php
namespace acl\Core\Controller\Helper;

class Router
{
    
    static public function readRoute ($url, $routes)
    {
        $router = self::route($url, $routes);
        $request = self::parseUrl($url, $router);
        $request = array_merge($router, $request);
        
        return $request;
    }
    
    static public function route($url, $routes)
    {
        
        $url =  explode("/",$url);
        
        if(!array_key_exists($url[1],$routes))
            return array('module' => 'Application',
                         'controller' => 'Error');
            
        return array('module' => $routes[$url[1]]['module'], 
                     'controller' => $routes[$url[1]]['controller']);
    }

     /**
     * Parse URL
     * @param string $url
     * @return array
     * 
     * array('controller', 'action', 'params'=>array());
     * 
     *  
        /                           -> controller = index, action = index, params = null
        /users                      -> controller = users, action = index, params = null
        /users/insert               -> controller = users, action = insert, params = null
        /users/update/id/8          -> controller = users, action = update, params = array(id=>8)
        /kaka                       -> controller = error, action = 404, params = null
        /users/kaka                 -> controller = error, action = 404, params = null
        /users/update/kaka/kaka2    -> controller = users, action = update, params = array(kaka=>kaka2)
        /users/update/kaka          -> controller = error, action = 400, params = null
     * 
     */
    
    static public function parseUrl($url, $router)
    {
        $actions = get_class_methods($router['module']."\\Controller\\".$router['controller']);
        

        // Descomponer la url
        $components = explode('/', $url);
         
        // Determinar el controlador
        if(file_exists(MODULE_PATH."/".$router['module']."/src/".$router['module']."/Controller/".$router['controller'].".php"))
            $array['controller'] = $router['controller'];
        else if(isset($components[1]))
            $array['controller'] = 'error';
    
         
        if ($components[1] != "")
        {
            // Determinar la accion
            if (isset($components[2]))
            {
                if(in_array($components[2]."Action", $actions))
                    $array['action'] = $components[2]."Action";
                else {
                    $array['controller'] = 'error';
                    $array['action'] = '404Action';
                }
                 
                if (isset($components[3]))
                {
                    // Si el número de parametros es impar
                    if (count($components) > 3 && count($components) % 2 == 0) {
                        $array['controller'] = 'error';
                        $array['action'] = '400Action';
                        $array['params'] = null;
                    }
                    else {
                        // Comprobar si existe controlador
//                         $existcontroller = false;
//                         foreach ($controller as $key => $value) {
//                             if (($array['controller'] == $key))
                                $existcontroller = true;
//                         }
                        // Si existe controlador
                        if ($existcontroller) {
                            // Comprobar si existe accion
                             
                            if (! in_array($array['action'], $actions)) {
                                $array['controller'] = 'error';
                                $array['action'] = '404Action';
                                $array['params'] = null;
                            }
                            else // Existe accion en el controlador
                            {
                                // Asignacion de los parametros
                                $num = 3;
                                while (isset($components[$num]))
                                {
                                    $array['params'][$components[$num]] = $components[$num + 1];
                                    $num += 2;
                                }
                            }
                        }
                        else {
                            $array['controller'] = 'error';
                            $array['action'] = '404Action';
                            $array['params'] = null;
                        }
                    }
                }
                else
                {
    //                 $array['controller'] = 'users';
    //                 $array['action'] = 'index';
                    $array['params'] = null;
                }
                 
            }
            else 
            {
                $array['action'] = 'indexAction';
            }
             
        }
        else {
            $array['controller'] = 'index';
            $array['action'] = 'indexAction';
            $array['params'] = null;
        }
        
        
        return $array;
    }
}

