//Contains updated style sheet!!!


//Store cookie information on the user
//This page links to the home page of Fash Fast. You must now set up a database of users
<?php
// define variables and set to empty values
$user = $pasword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   $username = test_input($_POST["username"]);
   $password = test_input($_POST["password"]);
   
}

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>jQuery Mobile page</title>
    
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link rel="stylesheet" href="jquery-mobile-theme-110927-0/themes/style_march.min.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
	




	//NB you may have to change the location of this stylesheet to MAMP/test/jquery-mobile-.....

    
    <script type="text/javascript" src="/path/to/jquery.js"></script>
	<script type="text/javascript" src="/Applications/MAMP/htdoc/test/jquery.jcarousel.js"></script>
</head>


<body>
	
<--Login page -->
<div data-role="page" >
<div data-role="header">

  <h2 id="banner">FastFash!</h2>

</div>
<!-- header header -->
		
<a rel="externa" href="FastFash.php" data-icon="home" data-iconpos="left" data-direction="reverse" class="ui-btn-left"
  		data-transition = "flip">Home</a>	
	
	<div data-role="content">
	
	
	
		<form id ="myForm" method="post" action="profiler.php" data-transition="pop" data-direction="reverse" />
		<fieldset>
			<div data-role ="fieldcontain">
			<h2>Login Information</h2>
			<label for="firstname" class="ui-hidden-accessible">Firstname:  </label><br>
			<input type ="text" name="firstname" id="firstname" placeholder="Firstname....">
			
			<label for="lastname" class="ui-hidden-accessible">lastname:  </label><br>
			<input type ="text" name="lastname" id="lastname" placeholder="lastname....">
			
			<label for="username" class="ui-hidden-accessible">Username:  </label><br>
			<input type="text" name="username" id="username" placeholder="username....">
			
			<label for="email" class="ui-hidden-accessible">Email:  </label><br>
			<input type="text" name="email" id="email" placeholder="Email:....">
			
			
			<label for="pass" class="ui-hidden-accessible">Password:  </label><br>
			<input type="password" name="pass" id="pass" placeholder="Password....">
			
			<label for="about" class="ui-hidden-accessible">About:  </label><br>
			<input type="text" name="about" id="about" placeholder="About me....">
			
			
			<label for="log">Keep me logged in</label><br />
			<input type="checkbox" name="login" id="log" value="1" data-mini="true"><br>
			<input type="submit" name="submit" value="Submit" data-icon="check" data-iconpos="right" data-inline="true">
		
			</div>	
		
		</fieldset>	
	
	</form>
	
	






<?php 
 
if ($_GET['pass'] != "hello")
	{
		 echo 'Invalid password.';
   				 
   	}
   	
else   				 
{


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




/* Selects the customers message from the database and prints to the screen */
$mysqli = new mysqli("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$mysqli->real_query("SELECT id, name,price,stock,image,description FROM products ORDER BY id ASC");
$res = $mysqli->use_result();
echo '<form action="editStock.php" method="post">';
echo "The items currently in stock are:...";
echo "<table border=1><tr><td>Name</td><td>Price</td><td>Units in Stock</td><td>Image</td><td>Description</td><td>Delete</td><td>Edit</td></tr>";
while ($row = $res->fetch_assoc()) {
    echo "<tr><td>{$row['name']}</td>";
    echo "<td>&#8364;{$row['price']}</td>" ;
    echo "<td>{$row['stock']}</td>" ;
    echo "<td><img class='thumbnail' src={$row['image']} width='200' height='150' /></td>" ;
    echo "<td>{$row['description']}</td>" ;
	//echo "<td><input type=button value='delete' onClick='deleteStock({$row['id']});'> </td>";
	echo "<td><a href='editNewStock.php?pass=hello&action=delete&id={$row['id']}'>Delete</a></td>";
	echo "<td><a href='editNewStock.php?pass=hello&action=edit&id={$row['id']}'>Edit</a></td>";
	//echo "<td><input type=button value='update' onClick='updateStock({$row['id']});'> </td></tr>";
    
}
echo "</table>";



/* close connection */

mysqli_close($link);




}

?>
<?php

echo $user;
echo "<br>";


?>
<!-- end content --> 	
</div>
	


<!-- end page --> 
</div>	
	

</body>

<script>
var password = "<? echo $_GET['pass'];  ?>";
	function updateStock(id){
		var txtbox = document.getElementById("description" + pk);
	var url = "editStock.php?pass="+password+"&action=update&id="+id+"&description="+txtbox.value;
	window.location= url;
	}
	
	function deleteStock(id){
		var url="editStock.php?pass="+password+"&action=delete+&id="+id;
		window.location=url;
	}	


</script>
</html>





