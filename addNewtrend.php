
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
<script>
var password = "<? echo $_GET['pass'];  ?>";
	function updateStock(id){
		var txtbox = document.getElementById("description" + pk);
	var url = "edittrends.php?pass="+password+"&action=update&id="+id+"&description="+txtbox.value;
	window.location= url;
	}
	
	function deleteStock(id){
		var url="edittrends.php?pass="+password+"&action=delete+&id="+id;
		window.location=url;
	}	


</script>
<body>
<!--Trends ----------------------------------->


<div data-role="page" id="Trends">
  	<div data-role="header" data-position ="fixed">
  		<a rel="external" href="FastFash.php" data-icon="home" data-iconpos="left" data-direction="reverse" class="ui-btn-left"
  		data-transition = "flip">Home</a>
  		<a href="#" class="ui-btn ui-icon-search ui-btn-icon-left ui-corner-all ui-shadow" data-transition = "flip">Search</a>
  

    	<h1>Welcome To My Trends Page</h1>
  	</div>
  	
  	
  	<!--Navigation bar ----------------------------------->
  	 <div data-role="navbar">
      <ul>
    	<li><a rel="external" href="FastFash.php#Outfit">Outfit of the Day</a>
        <li><a rel="external" href="Closet.php?pass=hello">Closet Profile</a></li>
      </ul>
    </div>
  	
  	
  	<!--Popup ----------------------------------->
<div data-role="main" class="ui-content">
    <a href="#myPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all">Hi there!</a>

    <div data-role="popup" id="myPopup" class="ui-content">
      <h3>Welcome to Trends page!</h3>
      <p>This page shows all the trends from the Spring/Summer 2014 collection</p>
  </div>
</div>


<?php
$link = mysqli_connect("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");
if (isset($_POST['name'])) {
	// we have been posted the form, so create new stock record and handle uploaded image
	$description = $link->escape_string($_POST['description']);
	$price = $link->escape_string($_POST['price']);
	$stock = $link->escape_string($_POST['stock']);
	$name = $link->escape_string($_POST['name']);
	$bfn = basename($_FILES['content']['name']);
	$ext = strtolower(substr(strrchr($bfn, '.'), 1));
if (!($ext=="jpg")) {
echo "<font color=red>The file ({$bfn}) does not appear to be a jpg!</font><P>";
}
else {
$dest = "trends/{$bfn}";
if (move_uploaded_file($_FILES['content']['tmp_name'], $dest)) {
$sql = "INSERT INTO trends (image,name,description, stock, price) VALUES ('trends/{$bfn}','{$name}','{$description}','{$stock}','{$price}');";
$link->query($sql);
//echo "<font color=red>New Image has been added!</font><P>";
header("Location: http://danu6.it.nuigalway.ie/siobhancollins/trends.php?pass=hello");
}
else {
echo "<font color=red>Error moving jpg file to {$dest}</font><P>";
}
}
}
else {
// we have not been posted the form, so present it to user
echo "Create New Upload:<p>";
echo "<form enctype='multipart/form-data' method='post' action='addNewtrend.php'>";
// Name
echo "FileName <input type=text name='name' style='width:250px;'><br>";
// Description
echo "Description <input type=text name='description' style='width:250px;'><br>";
//stock
echo "Stock <input type=text name='stock' style='width:250px;'><br>";
//price
echo "Price <input type=text name='price' style='width:250px;'><br>";

echo "</select><br>";
// Upload trend image
echo "Photo <input name='content'  type=file><P>";
// Submit button
echo "<input type=submit value='Create'>";
echo "</form>";
}
?>

<!-- end content --> 
 	
</div> 

<!-- end page --> 

</div>

	
<!--Footer ----------------------------------->
  	<div data-role="footer" data-position ="fixed">
    	<h1>Contact us</h1>
    	<a href="https://www.facebook.com/siobhan.collins.777" data-role="button" data-icon="plus""prefetchThisPage.html" data-prefetch>Add Me On Facebook</a>
    	<a href="#" data-role="button" data-icon="plus">Add Me On Twitter</a>
    	<a href="#" data-role="button" data-icon="plus">Add Me On Instagram</a>
  	</div>

</body>
</html>


</body>
</html>


