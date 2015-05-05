<?php
namespace Timeline\Entity;

class TimelineEntity
{
    public $idtimeline;
    public $startdate;
    public $enddate;
    public $headline;
    public $text;
    public $media;
    public $mediacredit;
    public $mediacaption;
    public $mediathumbnail;
    public $type;
    public $tag;
    
    /**
     * Hydrate $object with the provided $data.
     *
     * @param  array $data
     * @return object
     */       
    public function hydrate($data)
    {
        foreach ($data as $key=> $value)
        {
            $this->$key = $value;
        }    
        return $this; 
    }
    /**
     * Extract values from an object.
     *
     * @param object $object
     * @return array
     */    
    public function extract($object)
    {
        $data = get_object_vars($object);
        return $data;        
    }
}