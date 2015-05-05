<?php

return array(
    'idtimeline'=>array(
        'type'=>'hidden',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('required'=>true)
    ),
    'nombre'=>array(
        'label' => 'Nombre del Personaje',
        'type' => 'text',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>1,'required'=>true)
    ),
    'notas'=>array(
        'label' => 'Notas',
        'type' => 'text',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>1,'required'=>true)
    ),
    'submit'=>array(
        'label'=>'Enviar',
        'type'=>'submit'
    ),
);