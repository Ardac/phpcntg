<?php

function getUsers($config)
{
    $link = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
    //seleccionar db
    
    mysqli_select_db($link, $config['database']);
    //crear consulta
    $query="SELECT * FROM user";
    
    //enviar consulta
    $result = mysqli_query($link, $query);
    
    //recorrer recordset
    $i=0;
    while($row = mysqli_fetch_assoc($result))
    {
        
        $query2="SELECT transport_idtransport as transport FROM user_has_transport
                              where user_iduser='".$row['iduser']."';";
        $result2 = mysqli_query($link, $query2);

        if (mysqli_num_rows($result2) > 0) //En caso de tener transporte
        {
            
            while ($row2 = mysqli_fetch_assoc($result2))
            {
                $transportArray[] = $row2['transport'];
                    
            }
            $users[$i] = array_merge($row,array('transport'=>$transportArray));    

        }else{
            $users[$i]=array_merge($row,array(null)); //no tiene transporte
        }
        $transportArray=Array();
        
        $query2="SELECT language_idlanguage as code FROM user_has_language
                              where user_iduser='".$row['iduser']."';";
        $result2 = mysqli_query($link, $query2);
        
        if (mysqli_num_rows($result2) > 0) //En caso de tener transporte
        {
        
            while ($row2 = mysqli_fetch_assoc($result2))
            {
                $codeArray[] = $row2['code'];
        
            }
            $users[$i] = array_merge($users[$i],array('code'=>$codeArray));
        
        }else{
            $users[$i]=array_merge($users[$i],array(null)); //no tiene transporte
        }
        $codeArray=Array();
        
        $i++;
    }
    
    //cerra la coneccion
    
    mysqli_close($link);
    
    return $users;
}