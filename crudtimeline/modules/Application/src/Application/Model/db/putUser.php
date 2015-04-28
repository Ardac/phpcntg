<?php
function putUser($id,$data,$config)
{
    //recibe id user y todos los datos
    $userForm = include (APPLICATION_PATH.'/src/Application/Forms/UserForm.php');
    //conecta a la bdms
    $link = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
    //seleccionar db
    mysqli_select_db($link, $config['database']);
    //crear consulta
    $query="UPDATE timeline set startdate = '".$data['startdate']."',
                         enddate='".$data['enddate']."',
    					 headline='".$data['headline']."',
                         text='".$data['text']."',
                         media='".$data['media']."',
                         mediacredit='".$data['mediacredit']."',
                         mediacaption='".$data['mediacaption']."',
                         mediathumbnail='".$data['mediathumbnail']."',
                         type='".$data['type']."',
                         tag='".$data['tag']."'
                         WHERE idtimeline='".$id."';";

    $result = mysqli_query($link, $query);
    return true;
}

