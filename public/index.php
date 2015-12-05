<?php
/*******
This is the php router, that loads all necessary dependecy for views or controllers 

********/
include(__dir__."/../models/User.php");
session_start();
$request=(isset($_GET['request'])? $_GET['request']:"");
if($request=="dashboard" && isset($_SESSION['User'])){
    include(__dir__.'/../models/Image.php');
	include(__dir__.'/../controllers/images.php');
	include(__dir__.'/../views/userdashboard.php');
}else if($request=="upload" && isset($_SESSION['User'])){
	include(__dir__."/../controllers/upload.php");
	UploadController::uploadFile($_SESSION['User']->getID(), $_FILES);
	header("Location: dashboard");
}else if($request=="admin" && isset($_SESSION['User']) && $_SESSION['User']->isAdmin()){
	include(__dir__.'/../models/Image.php');
	include(__dir__.'/../controllers/images.php');
	include(__dir__.'/../views/admin.php');
}else if($request=="login"){
	include(__dir__.'/../controllers/login.php');
	$user=LoginController::LoginUser($_POST['email'],$_POST['password']);
	if($user!=null){
		$_SESSION['User']=$user;
		header("Location: dashboard");
	}
}else if($request=="register"){
	include(__dir__.'/../controllers/register.php');
	RegisterController::createUser($_POST['email'],$_POST['password1']);
	header("Location: index");
}else if($request=="delete" && isset($_SESSION['User'])){
	include(__dir__.'/../models/Image.php');
	include(__dir__.'/../controllers/images.php');
	ImageController::DeleteImage($_SESSION['User']->getID(), $_POST['imageid']);
	header("Location: dashboard");
}else{
	if(isset($_SESSION['User'])){
		header("Location: dashboard");
	}else{
		include(__dir__.'/../views/frontpage.php');
	}
}
?>