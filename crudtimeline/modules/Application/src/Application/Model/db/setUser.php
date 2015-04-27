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
                     mediathumbnail='".$data['thumbnail']."',
                     type='".$data['type']."',
                     tag='".$data['tag']."'";

//         echo "<pre>";
//         print_r($query);
//         echo "</pre>";
//         die;


    // Enviar la consulta
        $result = mysqli_query($link, $query);
    
    // Cerra la coneccion
        mysqli_close($link);

        
    return $result;
}