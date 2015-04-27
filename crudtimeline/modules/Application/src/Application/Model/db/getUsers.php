<?php

function getUsers($config)
{
    // Conectarse al DBMS
        $link = mysqli_connect($config['host'], 
                                $config['user'], 
                                $config['password']
                               );
        
    // Seleccionar la DB
        mysqli_select_db($link, $config['database']);
        
    // Crear la consulta
        $query = "SELECT * FROM timeline";

    // Enviar la consulta
        $result = mysqli_query($link, $query);
    
    // Recorrer el recordset
        while($row = mysqli_fetch_assoc($result))
        {
            $data[]=$row;
        }
    
        if (empty($data))
        {
            $data=array();
        }
        
    // Cerra la coneccion
        mysqli_close($link);
        
    return $data;
}