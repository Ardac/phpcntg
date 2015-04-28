<?php

function setUser($data, $config)
{

   
    // Conectarse al DBMS
        $link = mysqli_connect($config['host'], 
                                $config['user'], 
                                $config['password']
                               );
        
    // Seleccionar la DB
        mysqli_select_db($link, $config['database']);
        
        
    // Crear la consulta
        $query = "INSERT INTO timeline SET idtimeline='".time()."',
                     startdate='".$data['startdate']."',
                     enddate='".$data['enddate']."',
                     headline = '".$data['headline']."',
                     text='".$data['text']."',
                     media='".$data['media']."',
                     mediacredit='".$data['mediacredit']."',
                     mediacaption='".$data['mediacaption']."',
                     mediathumbnail='".$data['mediathumbnail']."',
                     type='".$data['type']."',
                     tag='".$data['tag']."'";

    // Enviar la consulta
        $result = mysqli_query($link, $query);
    
    // Cerra la coneccion
        mysqli_close($link);

        
    return $result;
}
