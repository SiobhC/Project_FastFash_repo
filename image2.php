<--Think this is working and uploading to images database with id and image-->



<?php
	$mysqli=mysqli_connect('danu6.it.nuigalway.ie', 'mydb1396cs', 'da1sus', 'mydb1396');

	if (!$mysqli)
		die("Can't connect to MySQL: ".mysqli_connect_error());

	$stmt = $mysqli->prepare("INSERT INTO images (image) VALUES(?)");
	$null = NULL;
	
	
	//<!--  blob parameter -->
	$stmt->bind_param("b", $null);

	$stmt->send_long_data(0, file_get_contents("prada.jpg")); 
	

	$stmt->execute();


$fp = fopen("prada.jpg", "r");
	while (!feof($fp)) 
	{
 	   $stmt->send_long_data(0, fread($fp, 16776192));
	}
?>	
	<?php
	$mysqli=mysqli_connect('danu6.it.nuigalway.ie', 'mydb1396cs', 'da1sus', 'mydb1396');

	if (!$mysqli)
		die("Can't connect to MySQL: ".mysqli_connect_error());

	$id=1;  
	$stmt = $mysqli->prepare("SELECT image FROM images WHERE id=?"); 
	$stmt->bind_param("i", $id);

	$stmt->execute();
	$stmt->store_result();

	$stmt->bind_result($image);
	$stmt->fetch();

	header("Content-Type: image/jpg");
	echo $image; 
?>
