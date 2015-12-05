<?php
/*********
This is the register controller and it handles creation of a new user

***********/
include(__dir__.'/../config/database.php');
class RegisterController{
	public static function createUser($email, $password){
		$datbase=new Database();
		$datbase->openConnection();
		mysqli_query($datbase->getConnection(),"INSERT INTO `Users`(`Email`,`Password`) VALUES('".mysqli_real_escape_string($datbase->getConnection(),$email)."','".mysqli_real_escape_string($datbase->getConnection(),hash("sha256",$password))."')");
		$datbase->closeConnection();
	}
}
?>