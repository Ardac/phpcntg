<?php
function readFields($array)
{
    $data = [];
    foreach ($array as $value)
    {
        $data[$value['description']]=$value['idclass'];
    }
    return $data;
}