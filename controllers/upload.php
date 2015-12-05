<?php
/*********
This is the upload controller and it handles validating the file type as well as moving the file to the correct folder location.
**********/
include(__dir__.'/../config/database.php');
class UploadController{
	public static function uploadFile($userid, $image){
		$type=$image['image']['type'];
		if($type=="image/png" || $type=="image/jpg" || $type=="image/jpeg"){
			if(move_uploaded_file($image['image']['tmp_name'],__dir__."/../public/images/".$image['image']['name'])){
				$database=new Database();
				$database->openConnection();
				mysqli_query($database->getConnection(),"INSERT INTO `Images`(`OwnerUserID`,`ImagePath`) VALUES('".$_SESSION['User']->getID()."','".mysqli_real_escape_string($database->getConnection(),"images/".$image['image']['name'])."')");
				$database->closeConnection();
			}
		}
	}
}
?>