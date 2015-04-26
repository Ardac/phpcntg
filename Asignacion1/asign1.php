<?php
/**
 * Funcion que calcula si tres puntos de coordenadas son colineales
 * param: array(int,int)
 * return: bool
 */
$array = array(
	array(-1,4),    //a
	array(3,0),     //b
	array(0,3),     //c
	);

echo Asign1($array);

function Asign1($array){
	//m = y2-y1 / x2 - x1
    //a y b
   $m1=($array[1][1] - $array[0][1])/($array[1][0] - $array[0][0]);
   //b y c
   $m2=($array[2][1] - $array[1][1])/($array[2][0] - $array[1][0]);
    if ($m1==$m2){
        //a y c
       $m3 = ($array[2][1] - $array[0][1])/($array[2][0] - $array[0][0]);    
    }else{
        return FALSE;
    }
    if ($m1==$m3){
        return TRUE;
    }
    return FALSE;
}

?>