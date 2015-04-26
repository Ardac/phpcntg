<?php
/**
 * Funcion que calcula si tres puntos de coordenadas formanun triangulo rectangulo
 * param: array(int,int)
 * return: bool
 */
$array = array(
    array(2,2),    //a
    array(3,-1),     //b
    array(-3,-3),     //c
);
echo Asign1($array);
function Asign1($array){
	//m = x2 - x1,y2-y1 
    //a y b
    $puntos = array(
            array(($array[1][0] - $array[0][0]),($array[1][1] - $array[0][1])),
    //b y c
            array(($array[2][0] - $array[1][0]),($array[2][1] - $array[1][1])),
    //c y a
            array(($array[0][0] - $array[2][0]),($array[0][1] - $array[2][1])),
    );
    //aplicar teorema de pitagoras
    foreach($puntos as $key => $value)
    {
        $teoPit[$key] = pow($puntos[$key][0],2) + pow($puntos[$key][1],2);
    }
    if ($teoPit[2]==($teoPit[0] + $teoPit[1])){
        return true;
    }else{
        return false;
    }
}