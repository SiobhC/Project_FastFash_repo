

<!DOCTYPE html>
<html>
<head>
    <title>jQuery Mobile page</title>
    
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
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
		
<a href="#home" data-icon="home" data-iconpos="left" data-direction="reverse" class="ui-btn-left"
  		data-transition = "flip">Home</a>	
	
	<div data-role="content">
	

	
		<form id ="myForm" method="post" action="login.php" data-transition="pop" data-direction="reverse" />
		<fieldset>
			<div data-role ="fieldcontain">
			<h2>Login Information</h2>
			<label for="username" class="ui-hidden-accessible">Username:  </label><br>
			<input type ="text" name="username" id="username" placeholder="Username....">
			
			<label for="pass" class="ui-hidden-accessible">Password:  </label><br>
			<input type="password" name="pass" id="pass" placeholder="Password....">
			
			<label for="log">Keep me logged in</label><br />
			<input type="checkbox" name="login" id="log" value="1" data-mini="true"><br>
			<input type="submit" name="submit" value="Submit" data-icon="check" data-iconpos="right" data-inline="true">
		
			</div>	
		
		</fieldset>	
		
		<!-- end content --> 	
		</div>
	
	</form>
	
	
<!-- end page --> 
</div>	

</body>
</html>
	

<?php
function login($username, $password)
{

    $username = mysqli_real_escape_string($username);
    $pass = mysqli_real_escape_string($pass);
    $query = "SELECT * FROM closet WHERE username='$username' AND pass='$pass'";

   $result = mysqli_query($mysqli,$query)or die(mysqli_error());
   $num_row = mysqli_num_rows($result);

   if( $num_row == 1 )
   {
     while( $row=mysqli_fetch_array($result) ){
      $_SESSION['id'] = $row['id'];
     }
   } else {
    echo 'oops  can not do it';
     // return false;
   }
echo 'hi there';
  //return true;
}
?>


 
<?php
session_start();
include ("databaseconnect.php");
login();
if (isset($_POST['submit'])){
    $validLogin = login($_POST['username'], $_POST['pass']);

    if ($validLogin){
        header("Location: FastFash.php");
        echo 'hi there';
     } else {
    	header("Location: registration.php");
        echo 'oops  can not do it';
     }

}
?>




