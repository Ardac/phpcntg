<?php
namespace Character\Gateways;

use acl\Core\Adapter\MysqlAdapter;

class MysqlCharacter extends MysqlAdapter
{
//     public function getCharacters()
//     {
//         $users = [];
//         $query = "SELECT * FROM characters";
//         $result = $this->query($query);
//         $users = $this->recordSet($result);
        
//         return $users;
//     }
    public function getClass()
    {
        $classes = [];
        $query = "SELECT idclass,description FROM class ORDER BY afiliation_idafiliation";
        $result = $this->query($query);
        $classes = $this->recordSet($result);
    
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




}

