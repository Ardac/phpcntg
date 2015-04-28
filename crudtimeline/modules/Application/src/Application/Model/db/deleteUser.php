<?php
function deleteUser($id,$config)
{
    $link = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
    mysqli_select_db($link, $config['database']);
    $query="DELETE FROM timeline where idtimeline='".$id."';";

    $result = mysqli_query($link, $query);
    mysqli_close($link);
    return true;
}