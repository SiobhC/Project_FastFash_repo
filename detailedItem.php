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
    	<h1>Closet Profile</h1>
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

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}



/* Selects the customers message from the database and prints to the screen */
$mysqli = new mysqli("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


$id = $_GET['id'];


//Query the 'closet' database and select  data matching the username for the session variable
$mysqli->real_query("SELECT id, pass, username,name,image,description FROM closet WHERE username='{$_SESSION['username']}' AND id='{$id}'");
$res = $mysqli->use_result();



		echo '<form action="ClosetTest.php" method="post">';
		echo "<h4>The image in your closet:...</h4>";
		echo "<ul data-role='listview' data-filter='true' data-filter-placeholder='Search closet...' data-inset='true'>";
		
			while ($row = $res->fetch_assoc()) {
			$image = $row['image'];
			
		if ($image != null){
		  	
		// Allow user to input items into profile 

		echo   "
        
        <img src='{$row['image']}' max-width=100% height='300' seamless>
        <h2>{$row['name']}</h2>
        <p>{$row['description']}</p>  
        
        <div data-role='controlgroup' data-type='horizontal' data-mini='true'>
    	<a rel='external' href='editCloset.php?pass=hello&action=edit&id={$row['id']}' data-transition='pop' data-role='button' data-icon='gear' data-theme='b'>Edit</a>
    	<a rel='external' href='editCloset.php?pass=hello&action=delete&id={$row['id']}' data-transition='pop' data-role='button' data-icon='delete' data-theme='b'>Delete</a>
		</div>
		 ";  
		 }
		 else{
		    	echo "<h4>Please upload images to your closet</h4> ";

				}
		}	

			

			
	


/* close connection */

mysqli_close($link);


?>

 <!--Footer -----------------------------------> 
<div data-role="footer" data-position ="fixed">
   <a href="https://www.facebook.com/siobhan.collins.777" data-role="button" data-icon="plus">Add Me On Facebook</a>
</div>
  
<!-- --------------------------------- -->
<!-- end content --> 

</div> 

<!-- end page --> 
</div>

</body>
</html>


