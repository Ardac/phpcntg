 <?php
function getUser($config,$id)
{
    
    $link = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
    //seleccionar db
    
    mysqli_select_db($link, $config['database']);
    //crear consulta
    //modifica los parametros de gender y city

    $query="SELECT * FROM timeline WHERE idtimeline='".$id."'";
    
  
    //enviar consulta
    $result = mysqli_query($link, $query);
    
    $row = mysqli_fetch_assoc($result);
    
    mysqli_close($link);
    
    return $row;
}