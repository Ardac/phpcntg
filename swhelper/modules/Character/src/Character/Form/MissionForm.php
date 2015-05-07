<?php

use Character\Mapper\CharacterMapper;

include (VENDOR_PATH."/acl/Core/src/Core/Forms/readFields.php");

$mapper = new CharacterMapper();
$missions = $mapper->getMissions();
$characters = $mapper->getCharacters();

return array(
    'idhistoric'=>array(
        'type'=>'hidden',
        'filters'=> array('Stringtrim', 'StripTags', 'Escape'),
        'validators' => array ('required'=>true)
    ),
    'characters_idcharacters'=>array(
        'label'=>'Character',
        'type'=>'select',
        'options'=>readFields($characters),
        'validators'=>array('inArray'=>true)
    ),
    'date'=>array(
        'label'=>'Date',
        'type'=>'date',
        'validators' => array ('date'=>true)
    ),    
    'mission_idmission'=>array(
        'label'=>'Mission',
        'type'=>'select',
        'options'=>readFields($missions),
        'validators'=>array('inArray'=>true)
    ),
    'submit'=>array(
        'label'=>'Enviar',
        'type'=>'submit'
    ),
);