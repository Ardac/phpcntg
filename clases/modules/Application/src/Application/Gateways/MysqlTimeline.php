<?php
namespace Application\Gateways;

use acl\Core\Adapter\MysqlAdapter;

class MysqlTimeline extends MysqlAdapter
{
    public function getUsers()
    {
        $users = [];
        $query = "SELECT * FROM timeline";
        $result = $this->query($query);
        $users = $this->recordSet($result);
        
        return $users;
    }
    
    public function setUser($data)
    {

        $query = "INSERT INTO timeline SET idtimeline='".time()."',
                     startdate='".$data['startdate']."',
                     enddate='".$data['enddate']."',
                     headline = '".$data['headline']."',
                     text='".$data['text']."',
                     media='".$data['media']."',
                     mediacredit='".$data['mediacredit']."',
                     mediacaption='".$data['mediacaption']."',
                     mediathumbnail='".$data['mediathumbnail']."',
                     type='".$data['type']."',
                     tag='".$data['tag']."'";
       
        $result = $this->query($query);
        $data = $this->recordSet($result);
        return $data;
    }
    public function getUser($id)
    {
        $user = [];
        $query = "SELECT * FROM timeline where idtimeline='".$id."'";
        $result = $this->query($query);
        $user = $this->recordSet($result);
        return $user;
    }
    
    public function putUser($id,$data)
    {
        $query="UPDATE timeline set startdate = '".$data['startdate']."',
                         enddate='".$data['enddate']."',
    					 headline='".$data['headline']."',
                         text='".$data['text']."',
                         media='".$data['media']."',
                         mediacredit='".$data['mediacredit']."',
                         mediacaption='".$data['mediacaption']."',
                         mediathumbnail='".$data['mediathumbnail']."',
                         type='".$data['type']."',
                         tag='".$data['tag']."'
                         WHERE idtimeline='".$id."';";
        $result = $this->query($query);
        $data = $this->recordSet($result);
        return $data;
    }
    public function deleteUser($id)
    {
        $query="DELETE FROM timeline where idtimeline='".$id."';";
        $result = $this->query($query);
        $data = $this->recordSet($result);
        return $data;
    }
}