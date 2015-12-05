<?php $images=ImageController::getUsersImages($_SESSION['User']->getID()); ?>
<html>
<head>
</head>
<body>
<p>Currently Logged in as <?php echo $_SESSION['User']->getEmail(); ?></p>
<div>
<h3>Upload Image</h3>
<form action="upload" method="post" enctype="multipart/form-data">
<p>Image <input type="file" name="image" /></p>
<button type="submit" name="upload">Upload</button>
</form>
</div>
<div>
<?php foreach ($images as &$image) { ?>
<div>
<img src="<?php echo $image->getImageFilePath(); ?>" />
<form method="post" action="delete">
<input type="hidden" name="imageid" value="<?php echo $image->getID(); ?>" />
<button type="submit">Delete</button>
</form>
</div>
<?php } ?>
</div>
</body>
</html>