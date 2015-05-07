<?php

use Character\Mapper\CharacterMapper;

include (VENDOR_PATH."/acl/Core/src/Core/Forms/readFields.php");

$mapper = new CharacterMapper();
$Classes = $mapper->getClass();
return array(
    'idcharacter'=>array(
        'type'=>'hidden',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('required'=>true)
    ),
    'name'=>array(
        'label'=>'Nombre Personaje',
        'type'=>'text',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>1,
            'required'=>true
        )
    ),
    'notes'=>array(
        'label'=>'Notas',
        'type'=>'text',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>1,
            'required'=>true
        )
    ),    
    'class_idclass'=>array(
        'label'=>'Clase',
        'type'=>'select',
        'options'=>readFields($Classes),
        'validators'=>array('inArray'=>true)
    ),
    'submit'=>array(
        'label'=>'Enviar',
        'type'=>'submit'
    ),
);