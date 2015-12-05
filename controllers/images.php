<?php
/*******
This is the image controller, get users images, get all images in the database and deletes an image.


*********/
include(__dir__.'/../config/database.php');
class ImageController{
	public static function getUsersImages($userid){
		$database=new Database();
		$database->openConnection();
		$results=mysqli_query($database->getConnection(),"SELECT `id`,`ImagePath` FROM `Images` WHERE `OwnerUserID`='".$_SESSION['User']->getID()."'");
		$database->closeConnection();
		$array=array();
		while ($row = mysqli_fetch_array($results)){
			array_push($array,new Image($row['id'],$row['ImagePath']));
		}
		return $array;
	}
	public static function getAllImages(){
		$database=new Database();
		$database->openConnection();
		$results=mysqli_query($database->getConnection(),"SELECT `Images`.`id`,`ImagePath`,`Email` FROM `Images` LEFT JOIN `Users` ON `Images`.`OwnerUserID`=`Users`.`id`");
		$database->closeConnection();
		$array=array();
		while ($row = mysqli_fetch_array($results)){
			$tempimage=new Image($row['id'],$row['ImagePath']);
			$tempimage->setOwner(new User(0, $row['Email']));
			array_push($array,$tempimage);
		}
		return $array;
	}
	public static function DeleteImage($ownerid,$imageid){
		$database=new Database();
		$database->openConnection();
		$result=mysqli_query($database->getConnection(),"SELECT `ImagePath` FROM `Images` WHERE `id`='".mysqli_real_escape_string($database->getConnection(),$imageid)."' AND `OwnerUserID`='".mysqli_real_escape_string($database->getConnection(),$ownerid)."' LIMIT 1");
		if(mysqli_num_rows($result)==1){
			mysqli_query($database->getConnection(),"DELETE FROM `Images` WHERE `id`='".mysqli_real_escape_string($database->getConnection(),$imageid)."' AND `OwnerUserID`='".mysqli_real_escape_string($database->getConnection(),$ownerid)."' LIMIT 1");
			unlink(__dir__.'/../public/'.mysqli_fetch_array($result)['ImagePath']);
		}
		$database->closeConnection();
		
	}	
}
?>