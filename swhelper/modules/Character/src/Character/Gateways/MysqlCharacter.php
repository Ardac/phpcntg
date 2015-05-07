<?php
namespace Character\Gateways;

use acl\Core\Adapter\MysqlAdapter;

class MysqlCharacter extends MysqlAdapter
{
    public function getClass()
    {
        $classes = [];
        $query = "SELECT idclass,description FROM class ORDER BY afiliation_idafiliation";
        $result = $this->query($query);
        $classes = $this->recordSetnum($result);
        return $classes;
    }
    public function setCharacter($data)
    {
        $columns = $this->getTableColumns('characters');
        $vals = [];
        foreach($data as $key => $value)
        {
            if(in_array($key, $columns))
                $vals[] = $key."='".$value."'";
        }
        $vals = implode(",", $vals);
        $query = "INSERT INTO characters SET ".$vals;
        $result = $this->query($query);
        return $result;
    }
    private function getTableColumns($table)
    {
        $data = [];
        $query = "describe ".$table;
        $result = $this->query($query);
        $data = $this->recordSet($result);
        $columns=[];
        foreach ($data as $field)
        {
            $columns[] = $field['Field'];
        }
        return $columns;
    }
    public function getCharacter($idcharacter)
    {
        $classes = [];
        $query = "SELECT * FROM characters WHERE idcharacter ='".$idcharacter."'";
        $result = $this->query($query);
        $classes = $this->recordSet($result);
        return $classes;
    }
    public function putCharacter($id, $data)
    {
        $columns = $this->getTableColumns('characters');
        $vals = [];
        foreach($data as $key => $value)
        {
            if(in_array($key, $columns))
                $vals[] = $key."='".$value."'";
        }
        $vals = implode(",", $vals);
        $query = "UPDATE characters SET ".$vals." WHERE idcharacter='".$id."'";
        $result = $this->query($query);
        return $result;
    }
    public function deleteCharacter($id)
    {
        $query = "DELETE FROM characters WHERE idcharacter='".$id."'";
        $result = $this->query($query);
        return $result;
    }
    public function getHistoric($id)
    {
        $historic = [];
        $query = "SELECT idhistoric,name,date,mission.description as mission_description,mission_type.description FROM swhelper.historic
                inner join characters on characters_idcharacters=idcharacter
                inner join mission on mission_idmission = idmision
                inner join mission_type on mission_type_idmission_type = idmission_type where characters_idcharacters='".$id."'";

        $result = $this->query($query);
        $historic = $this->recordSet($result);
        return $historic;
    }
    public function getMissions()
    {
        $missions = [];
        $query = "SELECT idmision,CONCAT(mission.description,' ',mission_type.description) as description FROM mission
                        inner join mission_type on idmission_type = mission_type_idmission_type ORDER BY description ASC";
        $result = $this->query($query);
        $missions = $this->recordSetnum($result);
        return $missions;
    }
    public function getCharacters()
    {
        $classes = [];
        $query = "SELECT idcharacter,name FROM characters";
        $result = $this->query($query);
        $classes = $this->recordSetnum($result);
        return $classes;
    }
    public function setMission($data)
    {
        $columns = $this->getTableColumns('historic');
        $vals = [];
        foreach($data as $key => $value)
        {
            if(in_array($key, $columns))
                $vals[] = $key."='".$value."'";
        }
        $vals = implode(",", $vals);
        $query = "INSERT INTO historic SET ".$vals;
        
        $result = $this->query($query);
        return $result;
    }
    public function getHistorics()
    {
        $historic = [];
        $query = "SELECT idhistoric,name,date,mission.description as mission_description,mission_type.description FROM swhelper.historic
                inner join characters on characters_idcharacters=idcharacter
                inner join mission on mission_idmission = idmision
                inner join mission_type on mission_type_idmission_type = idmission_type";
    
        $result = $this->query($query);
        $historic = $this->recordSet($result);
        return $historic;
    }
}
