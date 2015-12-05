<?php
/**************
This is the image model to hold all information for the image.
**************/
class Image{
	private $imageFilePath="";
	private $owner;
	private $id=0;
	public function __construct($initid,$initfilepath) {
    	$this->id=$initid;
    	$this->imageFilePath=$initfilepath;
	}
	public function getID(){
		return $this->id;
	}
	public function setImageFilePath($initimagefilepath){
		if(is_dir($initimagefilepath)){
			$this->imageFilePath=$initimagefilepath;
		}
	}
	public function getImageFilePath(){
		return $this->imageFilePath;
	}
	public function setOwner($initowner){
		$this->owner=$initowner;
	}
	public function getOwner(){
		return $this->owner;
	}
}
?>