<?php
/*******************
This is the user model, holding all information for an user.
*******************/
class User{
	private $id=0;
	private $email="";
	private $password="";
	private $isAdmin=false;
	public function __construct($initid=0,$initemail, $initpassword=null, $initisadmin=false) {
    	$this->id=$initid;
    	$this->email = $initemail;
    	$this->password = $initpassword;
    	$this->isAdmin = (bool)$initisadmin;
	}
	public function getID(){
		return $this->id;
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