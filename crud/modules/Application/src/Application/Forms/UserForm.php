<?php
return array(
    'iduser'=>array(
        'type'=>'hidden',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('required'=>true)
    ),
    'name'=>array(
        'label'=>'Nombre',
        'type'=>'text',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>1,
            'required'=>true
        )
    ),
    'email'=>array(
        'label'=>'Email',
        'type'=>'email',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>1,
            'required'=>true,
            'email'=>true
        )
    ),
    'password'=>array(
        'label'=>'Contraseña',
        'type'=>'password',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('lenghtMax'=>200,
            'lenghtMin'=>8,
            'required'=>true            
        )
    ),
    'birthdate'=>array(
        'label'=>'Fecha de nacimiento',
        'type'=>'date',
        'validators' => array ('date'=>true)
    ),
    'description'=>array(
        'label'=>'Descripcion',
        'type'=>'textarea',
        'filters'=> array('Stringtrim',  'Escape')        
    ),
    'gender'=>array( //TODO: El array de userform debe traerlo desde la BD
        'label'=>'Sexo',
        'type'=>'radio',
        'options'=>array('Mujer'=>'1',
            'Hombre' =>'2',
            'Otro'=>'3'            
        ),
        'validators'=>array('inArray'=>true,
                            'required'=>true
        )    
    ),
    'transport'=>array(
        'label'=>'Tipo de transporte',
        'type'=>'checkbox',
        'options'=>array('Bicicleta' =>'1',
                        'Moto'=>'2',
                        'Coche'=>'3'
        ),
        'validators'=>array('inArray'=>true)
    ),
    'city'=>array(
        'label'=>'Ciudad',
        'type'=>'select',
        'options'=>array('Santiago de Compostela'=>'1',
            'Vigo' =>'2',
            'A Coruña'=>'3'
        ),
        'validators'=>array('inArray'=>true)
    ),
    'code'=>array(
        'label'=>'Programas en?',
        'type'=>'selectmultiple',
        'options'=>array('PHP'=>'1',
            'C++'=>'2',
            'Python'=>'3',
            'Java' =>'4',
            'Otros'=>'otros',
        ),
        'validators'=>array('inArray'=>true)
    ),
    'submit'=>array(
        'label'=>'Enviar',
        'type'=>'submit'                
    ),
    
    
);