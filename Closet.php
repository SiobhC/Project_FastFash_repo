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
		<h1>Closet Profile!</h1>
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
  <div data-role="collapsible">
      	<h1>Shoes!</h1>
      	<p>
      This is page four and should contain all the clothes owned by the user</p>
      	<div data-role="collapsible">
      		<h4>Heels</h4>
    			<ul data-role="listview" data-filter="true" data-filter-placeholder="Search closet..." data-inset="true">
    				<li><a href="#">Green</a></li>
    				<li><a href="#">Black</a></li>
    			</ul>   	
		</div>
    	<div data-role="collapsible">
      		<h1>Pumps</h1>
      	 	<p>This should contain a image and description of users pumps </p>
      	</div>
   </div>
   

   
    <ul data-role="listview" data-filter="true" data-filter-placeholder="Search closet..." data-inset="true">
    	<li><a href="#">Shoes</a></li>
    	<li><a href="#">Tops</a></li>
    	<li><a href="#">Jeans</a></li>
    	<li><a href="#">Accessories</a></li>
    	<li><a href="#">Dresses</a></li>
    	<li><a href="#">Coats/Jackets</a></li>
	</ul>   	
	
  	
<!-- Allow user to input items into profile --> 

<div data-role="controlgroup" data-type="horizontal" data-mini="true">
    <a rel="external" href='editCloset.php?pass=hello&action=edit&id={$row['id']}' data-role="button" data-icon="plus" data-theme="b">Add</a>
    <a href="#" href='editCloset.php?pass=hello&action=delete&id={$row['id']}' data-role="button" data-icon="delete" data-theme="b">Delete</a>
    <a href="#" href="addNewCloset.php" data-role="button" data-icon="grid" data-theme="b">Edit</a>
</div>


<?php 


// Output: Password is valid!

$link = mysqli_connect("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}



/* Select queries return a resultset, selects customer first names */
if ($result = mysqli_query($link, "SELECT messages FROM comments")) {
    printf("\nThere has been %d messages submitted. \n", mysqli_num_rows($result));

  
    mysqli_free_result($result);
}

 
 echo $_SESSION['username'];
 echo $_SESSION['pass'];
 echo "This is for session variables";


/* Selects the customers message from the database and prints to the screen */
$mysqli = new mysqli("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$mysqli->real_query("SELECT id, pass, username,name,image,description FROM closet WHERE username='{$_SESSION['username']}'");
$res = $mysqli->use_result();
$row = $res->fetch_assoc();
$image = "{$row['image']}";

/*Check if there is already an image uploaded by the current user, if not send them a message to upload images to their profile*/
	if ($image == null) {
   				 echo "There are currently no items in your closet, please upload some images";
   				 echo '<form action="editCloset.php" method="post">';
				 echo "Add items to your closet:...";
				 echo "<table border=0><tr><td></td></tr>";
					while ($row = $res->fetch_assoc()) {
    					echo "<td><a rel='external' href='addNewCloset.php' data-role='button' data-icon='plus' data-theme='b'>Add</a></td></tr>";
    					}
				echo "</table>";

				}
				
/*Else the user already has  a profile and can now view their items*/				
		else{
		echo '<form action="editCloset.php" method="post">';
		echo "The items currently in your closet are:...";
		echo "<table border=0><tr><td>Name</td><td>Image</td><td>Description</td><td>Delete</td><td>Edit</td><td>Add</td></tr>";
			while ($row = $res->fetch_assoc()) {
    			echo "<tr><td>{$row['name']}</td>";
    			echo "<td><img class='thumbnail' src={$row['image']} width='200' height='150' /></td>" ;
    			echo "<td>{$row['description']}</td>" ;
				echo "<td><a rel='external' href='editCloset.php?pass=hello&action=delete&id={$row['id']}' data-role='button' data-icon='delete'>Delete</a></td>";
				echo "<td><a rel='external' href='editCloset.php?pass=hello&action=edit&id={$row['id']}' data-role='button' data-icon='plus'>Edit</a></td>";
  				echo "<td><a rel='external' href='addNewCloset.php' data-role='button' data-icon='plus' data-theme='b'>Add</a></td></tr>";
    
				}
		echo "</table>";

		}

/* close connection to database*/

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


