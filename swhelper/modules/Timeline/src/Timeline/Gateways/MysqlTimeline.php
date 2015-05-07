<?php
namespace Timeline\Gateways;

use acl\Core\Adapter\MysqlAdapter;

class MysqlTimeline extends MysqlAdapter
{
    public function getCharacters()
    {

        $data = [];
        $query = "SELECT idcharacter,name,notes,description FROM swhelper.characters
                    inner join class on class_idclass=idclass";
        $result = $this->query($query);

        $data = $this->recordSet($result);
        return $data;
    }
}



















