<?php
/**
 *
* Filter special character
* Filter Stringtrim StripTags Escape
*
*
*
* @param array $formDefinition
* @param array $data
* @return array $data
*/

include ('stringTrim.php');
include ('stripTags.php');
include ('escape.php');
function FilterForm($formDefinition, $data)
{
    foreach ($data as $key => $value)                                              
    {
        if ((array_key_exists($key, $formDefinition) ) && (array_key_exists('filters',$formDefinition[$key]))) //si el elemento existe en la definicion y si el elemento debe o no ser filtrado  
        {
            foreach ($formDefinition[$key]['filters'] as $valueFilters)  //recorre todos los filtros asociados al elemento
            {
                if (array_key_exists($valueFilters, $valueFilters)) //valida que el filtro definido existe en el listado de filtros
                {
                    switch ($valueFilters)
                    {
                        case 'Stringtrim':
                            $data[$key] = stringTrim($data[$key]);
                        break;
                        case 'StripTags':
                            $data[$key] = stripTags($data[$key]);
                        break;
                        case 'Escape':
                            $data[$key] = escape($data[$key]);
                        break;
                        default:
                    }  
                }
            }
        }
    }
    return $data;
}