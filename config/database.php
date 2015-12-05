<?php
/*******************
This is the database class which holds information for connecting to the database.
********************/
class Database{
	private $db=null;
	private $username="root";
	private $password="";
	private $host="localhost";
	private $database="phpcodingexercise";
	public function openConnection(){
		$this->db=mysqli_connect($this->host,$this->username,$this->password,$this->database);
	}
	public function getConnection(){
		return $this->db;
	}
	public function closeConnection(){
		mysqli_close($this->db);
	}
}
?>