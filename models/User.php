<?php
/*******************
This is the user model, holding all information for an user.
*******************/
class User{
	private $id=0;
	private $username="";
	private $email="";
	private $password="";
	private $isAdmin=false;
	public function __construct($initid=0, $initusername,$initemail, $initpassword=null, $initisadmin=false) {
    	$this->id=$initid;
    	$this->username=$initusername;
    	$this->email = $initemail;
    	$this->password = $initpassword;
    	$this->isAdmin = (bool)$initisadmin;
	}
	public function getID(){
		return $this->id;
	}
	public function getUsername(){
		return $this->username;
	}
	public function setUsername($initusername){
		$this->username=$initusername;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setEmail($initemail){
		$this->email=$initemail;
	}
	public function setPassword($initpassword){
		$this->password=$initpassword;
	}
	public function isAdmin(){
		return $this->isAdmin;
	}
	public function setIsAdmin($initisadmin){
		$this->isAdmin=$initisadmin;
	}
}
?>