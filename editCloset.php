<?PHP

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

	header ("Location: http://danu6.it.nuigalway.ie/siobhancollins/login.php");

}

?>
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

/* Selects the customers message from the database and prints to the screen */


$mysqli = new mysqli("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
 

if(isset($_POST['action'])){
	if ($_POST['action']=="update") {
		
		$mysqli->real_query("UPDATE closet SET name='{$_POST['name']}',name='{$_POST['name']}',description='{$_POST['description']}' WHERE id={$_POST['id']};");
			header("Location: http://danu6.it.nuigalway.ie/siobhancollins/ClosetTest.php?pass=hello");
}

}
else if($_GET['action']=="delete") {
		
		$mysqli->real_query("DELETE FROM closet WHERE id={$_GET['id']};");
		header("Location: http://danu6.it.nuigalway.ie/siobhancollins/ClosetTest.php?pass=hello");
		
	
}else if($_GET['action']=="edit") {
		
		$mysqli->real_query("SELECT * FROM closet WHERE id={$_GET['id']} AND username='{$_SESSION['username']}'");
		$res = $mysqli->use_result();

		echo '<form action="editCloset.php?pass=hello" method="post">';
		echo "Please modify the tables below to adjust the items in your closet:...";
		echo "<table border=1><tr><td>Name</td><td>Description</td><td>Submit</td></tr>";

		while ($row = $res->fetch_assoc()) {
    		echo "<tr><td><input type='text' name='name' value='{$row['name']}'>";
    		echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
   			echo "<input type='hidden' name='action' value='update'></td>";
	
	
			echo "<td><input type='text' name='description' value='{$row['description']}'>";
    		echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    		echo "<input type='hidden' name='action' value='update'></td>";
    
			echo "<td><input type=submit data-role='button' data-icon='plus'></td></tr>";
	
    
		}
	echo "</table>";
	
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

