<?php
function getUser($id,$config)
{
    $link = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
    //seleccionar db
    
    mysqli_select_db($link, $config['database']);
    //crear consulta
    //modifica los parametros de gender y city

    $query="SELECT iduser,name,email,password,photo,
                DATE_FORMAT(birthdate,'%Y-%m-%d') as birthdate,description,
                gender_idgender as gender,city_idcity as city 
            FROM user WHERE iduser='".$id."'";
    
   
    
    //enviar consulta
    $result = mysqli_query($link, $query);
    
    //recorrer recordset
    $i=0;
    while($row = mysqli_fetch_assoc($result))
    {
        $query="SELECT transport_idtransport as transport FROM user_has_transport
                                  where user_iduser='".$id."';";
        $result2 = mysqli_query($link, $query);
        
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
       // $i++;

        
        $query="SELECT language_idlanguage as code FROM user_has_language
                                  where user_iduser='".$id."';";
        $result2 = mysqli_query($link, $query);
        
       
        if (mysqli_num_rows($result2) > 0) //En caso de tener codigo
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

    mysqli_close($link);
    
    return $users;
}