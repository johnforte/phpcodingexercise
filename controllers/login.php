<?php
/*********
This is the login conroller validating if the login credentials are correct. 

**********/
include(__dir__.'/../config/database.php');
class LoginController{
	public static function LoginUser($email, $password){
		$datbase=new Database();
		$datbase->openConnection();
		$results=mysqli_query($datbase->getConnection(),"SELECT `id`,`Email`,`Password`,`IsAdmin` FROM `Users` WHERE `Email`='".mysqli_real_escape_string($datbase->getConnection(),$email)."' AND `Password`='".mysqli_real_escape_string($datbase->getConnection(),hash("sha256",$password))."' LIMIT 1");
		$resultsarray=mysqli_fetch_array($results);
		$datbase->closeConnection();
		if(mysqli_num_rows($results)==1){
			return new User($resultsarray['id'],$resultsarray['Email'],$resultsarray['Password'],($resultsarray['IsAdmin']==1? true:false));
		}else{
			return null;
		}
	}
}
?>