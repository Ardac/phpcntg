<?php
function readFields($array)
{
    $data = [];
    foreach ($array as $value)
    {
        $data[$value[1]]=$value[0];
    }
    return $data;
}