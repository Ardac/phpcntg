<?php
class Router
{
    public static function route()
    {
        $controller = array(
            'users' => array(
                'insert',
                'update',
                'delete',
                'select'
            ),'crud' => array(
                'insert',
                'update',
                'delete',
                'select'
            )
        );
        
        return $controller;
    }
}