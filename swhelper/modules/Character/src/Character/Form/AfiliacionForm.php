<?php
//TODO leer la afiliacion desde la base de datos
return array(
    'afiliacion'=>array(
        'label'=>'Afiliación',
        'type'=>'select',
        'options'=>array('Imperio'=>'1',
            'República' =>'2',
        ),
        'validators'=>array('inArray'=>true)
    ),
    'submit'=>array(
        'label'=>'Enviar',
        'type'=>'submit'
    ),
);