<?php
function deleteUser($id,$config)
{
    $link = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
    mysqli_select_db($link, $config['database']);
    $query="DELETE FROM user_has_language where user_iduser='".$id."';";
    $result = mysqli_query($link, $query);
    $query="DELETE FROM user_has_transport where user_iduser='".$id."';";
    $result = mysqli_query($link, $query);
    $query="DELETE FROM user WHERE iduser='".$id."';";
    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return true;
}