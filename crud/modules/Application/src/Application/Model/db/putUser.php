<?php
function putUser($id, $data,$config)
{
    //recibe id user y todos los datos
    $userForm = include (APPLICATION_PATH.'/src/Application/Forms/UserForm.php');
    //conecta a la bdms
    $link = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
    //seleccionar db
    mysqli_select_db($link, $config['database']);
    //crear consulta
    $query="UPDATE user set iduser='".$data['iduser']."',
    					 name = '".$data['name']."',
                         email='".$data['email']."',
    					 password='".$data['password']."',
                         description='".$data['description']."',
                         birthdate='".$data['birthdate']."',
                         gender_idgender=".$data['gender'].",
                         city_idcity=".$data['city']."
                         WHERE iduser='".$id."';";
    
    $result = mysqli_query($link, $query);
    $query = "DELETE FROM user_has_transport
                    where user_iduser='".$id."';";
    $result = mysqli_query($link, $query);

    if (!empty($data['transport']))
    {

        foreach ($data['transport'] as $value)
        {
            
            $query="INSERT user_has_transport SET user_iduser='".$id."',
					 transport_idtransport='".$value."';";
            $result = mysqli_query($link, $query);
        }
    }
    
    $query = "DELETE FROM user_has_language
                    where user_iduser='".$id."';";
    $result = mysqli_query($link, $query);
    
    if (!empty($data['code']))
    {
    
        foreach ($data['code'] as $value)
        {
            $query="INSERT user_has_language SET user_iduser='".$id."',
					 language_idlanguage='".$value."';";
//             echo "<pre>";
//             print_r($query);
//             echo "</pre>";
            //die;
            
            $result = mysqli_query($link, $query);
        }
    }
// die;
    return true;
}