<html>
<head></head>
<body>
<?php
$link = mysqli_connect("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");


if (isset($_POST['name'])) {
// we have been posted the form, so create new employee record and handle uploaded image
$name = $link->escape_string($_POST['name']);
$country = $link->escape_string($_POST['description']);
$bfn = basename($_FILES['image']['name']);
$ext = strtolower(substr(strrchr($bfn, '.'), 1));
if (!($ext=="jpg")) {
echo "<font color=red>The file ({$bfn}) does not appear to be a jpg!</font><P>";
}
else {
$dest = "\\Users\\admin\\Documents\\html_files\\trends\\{$bfn}";
if (move_uploaded_file($_FILES['image']['tmp_name'], $dest)) {
$sql = "INSERT INTO trends (name,price,stock,description,image) VALUES ('{$name}','{$price}','{$description}','{$bfn}');";
$link->query($sql);
echo "<font color=red>New trend has been added!</font><P>";
}
else {
echo "<font color=red>Error moving jpg file to {$dest}</font><P>";
}
}
}
else {
// we have not been posted the form, so present it to user
echo "Create New Trend:<p>";
echo "<form enctype='multipart/form-data' method='post' action='newEmployee.php'>";
// Name
echo "Name <input type=text name='name' style='width:250px;'><br>";
// Description
echo "Description <select name='description'>";
$sql = "SELECT * FROM trends;";
$result = $link->query($sql);
while ($row = mysqli_fetch_array($result)) {
echo "<option value='{$row['id']}'>{$row['description']}</option>";
}
echo "</select><br>";
// Upload trend image
echo "Image <input name='image' type=file><P>";
// Submit button
echo "<input type=submit value='Create'>";
echo "</form>";
}
?>
</body>
</html>