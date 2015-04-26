<?php

function setUser($data,$config)
{
    $link = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
    //seleccionar db
    
    mysqli_select_db($link, $config['database']);

    //crear consulta
    $iduser = time();
    $query="INSERT user SET iduser='".$iduser."',
					 name = '".$data['name']."',
                     email='".$data['email']."',
					 password='".$data['password']."',
                     description='".$data['description']."',
                     birthdate='".$data['birthdate']."',
                     gender_idgender=".$data['gender'].",
                     city_idcity=".$data['city'].";";

    $result = mysqli_query($link, $query);
    

    foreach ($data['transport'] as $value)
    {
        $query="INSERT user_has_transport SET user_iduser='".$iduser."',
                        transport_idtransport='".$value."';";
       $result = mysqli_query($link, $query);
    }
    
    
    foreach ($data['code'] as $value)
    {
        $query="INSERT user_has_language SET user_iduser='".$iduser."',
                        language_idlanguage='".$value."';";
        $result = mysqli_query($link, $query);
    }
    //cerra la coneccion
    mysqli_close($link);
    return $data; 
}
