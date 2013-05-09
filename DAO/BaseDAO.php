<?php
class BaseDAO{

	protected $user="student2";
	protected $pass="password";
	protected $db_name="online_selling";
	protected $dbh=null;

	function open(){

		$this->dbh=new PDO("mysql:host=student2.e2ps; dbname=".$this->db_name,$this->user,$this->pass);

	}
	function close(){

		$this->dbh=null;

	}
}
?>


