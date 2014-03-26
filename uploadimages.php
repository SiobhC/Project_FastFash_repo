<?php require_once('top.phtml'); ?>
<?php
session_start();

$username="mydb1396cs";
$password="da1sus";
$database="mydb1396";

$mysqli = new mysqli("danu6.it.nuigalway.ie", $username, $password, $database);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    die();
}

$result = 0;

//UPLOAD IMAGE FILE

move_uploaded_file($_FILES["fileImage"]["tmp_name"], "ImageFiles/" . $_FILES["fileImage"]["name"]);

$result = 1;

//INSERT INTO IMAGE DATABASE TABLE

$imagesql = "INSERT INTO Image (ImageFile) VALUES (?)";

if (!$insert = $mysqli->prepare($imagesql)) {
    // Handle errors with prepare operation here
}

//Dont pass data directly to bind_param store it in a variable
$insert->bind_param("s", $img);

//Assign the variable
$img = 'ImageFiles/' . $_FILES['fileImage']['name'];

$insert->execute();

//RETRIEVE IMAGEID FROM IMAGE TABLE


$lastID = $insert->insert_id;

//INSERT INTO IMAGE_QUESTION DATABASE TABLE

$imagequestionsql = "INSERT INTO Image_Question (ImageId, SessionId, QuestionId) VALUES (?, ?, ?)";


if (!$insertimagequestion = $mysqli->prepare($imagequestionsql)) {
    // Handle errors with prepare operation here
}

$sessid =  $_SESSION['id'] . ($_SESSION['initial_count'] > 1 ? $_SESSION['sessionCount'] : '');

$insertimagequestion->bind_param("sss", $lastID, $sessid, $_POST['numQuestion'][$i]);

$insertimagequestion->execute();

//IF ANY ERROR WHILE INSERTING DATA INTO EITHER OF THE TABLES
if ($insert->errno) {
  // Handle query error here
}

$insert->close();

if ($insertimagequestion->errno) {
  // Handle query error here
}

$insertimagequestion->close();
?>
<?php require_once('bottom.phtml'); ?>