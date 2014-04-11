<!DOCTYPE html>
<html>
<head>
    <title>jQuery Mobile page</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>

	
	<script type="text/javascript" src="/Users/admin/Documents/1.0.11/simple-inheritance.min.js">
	<script type="text/javascript" src="/Users/admin/Documents/1.0.11/code-photoswipe-1.0.9.min.js">
	<!-- NB you may have to change the location of this stylesheet to MAMP/test/jquery-mobile-..... -->

					
    
    <script type="text/javascript" src="/path/to/jquery.js"></script>
	<script type="text/javascript" src="/Users/admin/Documents/html_files/jcarousel-0.3.0"></script>
	
	
	
	
	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
	
</head>
<body>
<!--Closet Profile --------------------------------- -->

<div data-role="page" id="Closet">
  <div data-role="header" data-position ="fixed">
  <a rel="external" href="FastFash.php" data-icon="home" data-iconpos="left" data-direction="reverse" class="ui-btn-left" data-transition = "flip">Home</a>
   <a href ="page2.php" rel="external" data-role="button" data-icon="minus">Log out</a>
    <h1>Welcome to your Closet Profile!</h1>
  </div>
  
    <!--Navigation Bar ----------------------------------->
    <div data-role="navbar">
    	<ul>
    		<li><a rel="external" href="trends.php?pass=hello">Trends</a>
    		<li><a rel="external" href="FastFash.php#Outfit">Outfit of the Day</a>
    	</ul>
    </div>
    
    <!--Closet profile content -----------------------------------> 
  <div data-role="content" >

<?php
$link = mysqli_connect("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");

//New Closet item
if (isset($_POST['name'])) {
// we have been posted the form, so create new closet item and handle uploaded image
$name = $link->escape_string($_POST['name']);
$country = $link->escape_string($_POST['description']);
$bfn = basename($_FILES['image']['name']);
$ext = strtolower(substr(strrchr($bfn, '.'), 1));
if (!($ext=="jpg")) {
echo "<font color=red>The file ({$bfn}) does not appear to be a jpg!</font><P>";
}
else {
$dest = "\\Users\\admin\\Documents\\html_files\\closet\\{$bfn}";
if (move_uploaded_file($_FILES['image']['tmp_name'], $dest)) {
$sql = "INSERT INTO trends (name,description,image) VALUES ('{$name}','{$description}','{$bfn}');";
$link->query($sql);
echo "<font color=red>New closet outfit has been added!</font><P>";
}
else {
echo "<font color=red>Error moving jpg file to {$dest}</font><P>";
}
}
}
else {
// we have not been posted the form, so present it to user
echo "Create New Closet item:<p>";
echo "<form enctype='multipart/form-data' method='post' action='newCloset.php'>";
// Name
echo "Name <input type=text name='name' style='width:250px;'><br>";
// Description
echo "Description <select name='description'>";
$sql = "SELECT * FROM closet;";
$result = $link->query($sql);
while ($row = mysqli_fetch_array($result)) {
echo "<option value='{$row['id']}'>{$row['description']}</option>";
}
echo "</select><br>";
// Upload closet items image
echo "Image <input name='image' type=file><P>";
// Submit button
echo "<input type=submit value='Create'>";
echo "</form>";
}
?>



<!--Footer -----------------------------------> 
  <div data-role="footer" data-position ="fixed">
   <a href="https://www.facebook.com/siobhan.collins.777" data-role="button" data-icon="plus">Add Me On Facebook</a>
  </div>
  
<!-- end content --> 

</div> 

<!-- end page --> 
</div>
</body>
</html>