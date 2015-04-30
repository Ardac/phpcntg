<?php
namespace acl\Core\Adapter;

class MysqlAdapter
{
    protected $link;
    private $config;
    
    public function __construct($config)
    {
        $this->config = $config;
        $this->connect();
        $this->selectDb();
    }
    
    private function connect()
    {
        // Conectarse al DBMS
        $this->link = mysqli_connect($this->config['host'],
            $this->config['user'],
            $this->config['password']
        );
    }
    
    private function selectDb()
    {
        // Seleccionar la DB
        mysqli_select_db($this->link, $this->config['database']);
    }
    
    public function query($query)
    {
        // Enviar la consulta
        $result = mysqli_query($this->link, $query);
        return $result;
    }
    
    public function recordSet($result)
    {
        $data = [];
        // Recorrer el recordset
        while($row = mysqli_fetch_assoc($result))
        {
            $data[]=$row;
        }
        
        return $data;
    }
    
    private function close()
    {
        // Cerra la coneccion
        mysqli_close($this->link);
    }
    
    public function __destruct()
    {
        $this->close();
    }
       
   
}
