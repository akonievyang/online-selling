<?php
class BaseDAO{

	protected $user="akonievyang";
	protected $pass="mgaebay";
	protected $db_name="online_selling";
	protected $dbh=null;

	function open(){

		$this->dbh=new PDO("mysql:host=student1.e2ps; dbname=".$this->db_name,$this->user,$this->pass);

	}
	function close(){

		$this->dbh=null;

	}
}
?>


