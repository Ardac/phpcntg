<?php
namespace Character\Gateways;

use acl\Core\Adapter\MysqlAdapter;

class MysqlCharacter extends MysqlAdapter
{
    public function getUsers()
    {
        $users = [];
        $query = "SELECT * FROM personaje";
        $result = $this->query($query);
        $users = $this->recordSet($result);
        
        return $users;
    }
}