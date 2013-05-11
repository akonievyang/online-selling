<?php
class BaseDAO{

    protected $user="akonievyang";
    protected $pass="mgaebay";
    protected $db_name="online-selling";
    protected $dbh=null;

    function open(){

        $this->dbh=new PDO("mysql:host=192.168.1.142; dbname=".$this->db_name,$this->user,$this->pass);

    }
    function close(){

        $this->dbh=null;

    }
}
?>


