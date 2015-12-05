<?php $images=ImageController::getAllImages(); ?>
<html>
<head>
</head>
<body>
<?php foreach ($images as &$image) { ?>
<div>
<p><?php echo $image->getOwner()->getEmail();?></p>
<img src="<?php echo $image->getImageFilePath(); ?>" />
</div>
<?php } ?>
</body>
</html>