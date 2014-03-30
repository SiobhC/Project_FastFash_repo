//Now adding an image to the database
<html>
<head></head>
<body>
<?php
$link = mysqli_connect("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");
if (isset($_POST['name'])) {
	// we have been posted the form, so create new employee record and handle uploaded image
	$description = $link->escape_string($_POST['description']);
	$name = $link->escape_string($_POST['name']);
	$password = $link->escape_string($_POST['password']);
	$bfn = basename($_FILES['content']['name']);
	$ext = strtolower(substr(strrchr($bfn, '.'), 1));
if (!($ext=="jpg")) {
echo "<font color=red>The file ({$bfn}) does not appear to be a jpg!</font><P>";
}
else {
$dest = "pictures/{$bfn}";
if (move_uploaded_file($_FILES['content']['tmp_name'], $dest)) {
$sql = "INSERT INTO images (image,name,description) VALUES ('pictures/{$bfn}','{$name}','{$description}');";
$link->query($sql);
echo "<font color=red>New Image has been added!</font><P>";
}
else {
echo "<font color=red>Error moving jpg file to {$dest}</font><P>";
}
}
}
else {
// we have not been posted the form, so present it to user
echo "Create New Upload:<p>";
echo "<form enctype='multipart/form-data' method='post' action='newImage.php'>";
// Name
echo "FileName <input type=text name='name' style='width:250px;'><br>";
// Description
echo "Description <input type=text name='description' style='width:250px;'><br>";

//Password
echo "Password <input type=text name='password' style='width:250px;'><br>";


echo "</select><br>";
// Upload mugshot image
echo "Photo <input name='content'  type=file><P>";
// Submit button
echo "<input type=submit value='Create'>";
echo "</form>";
}
?>
</body>
</html>