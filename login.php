 <?php 
 // Connects to your Database 

 // Output: Password is valid!

$link = mysqli_connect("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


 //This code runs if the form has been submitted

 if ($_SERVER['REQUEST_METHOD'] == "POST") { 



 // checks if the username is in use

 	if (!get_magic_quotes_gpc()) {

 		$_POST['username'] = addslashes($_POST['username']);
 		$_POST['pass'] = addslashes($_POST['pass']);
		
 	}

	

    $check = mysqli_query($link, "SELECT * FROM closet WHERE username='{$_POST['username']}' AND pass='{$_POST['pass']}';");
	$check2 = mysqli_num_rows($check);
	

 	$username = $link->escape_string($_POST['username']);
	$pass = $link->escape_string($_POST['pass']);
	
 	// encrypt passwords

 	$_POST['pass'] = md5($_POST['pass']);



 //if the name exists it gives an error

 if ($check2 != null) {
		echo "logged on!";
 		die('Sorry, the username '.$_POST['username'].' is already in use.');
	
		
	// IF ALL OKAY SET SESSION
	session_start();
	$username = $_POST['username'];
	$pass = $_POST['pass'];
    setcookie("username", $username, time()+7200);
    setcookie("pass", $pass, time()+7200);
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['pass'] = $_POST['pass'];
    $_SESSION['login'] = "1";
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60 * 60);
    header("Location: http://danu6.it.nuigalway.ie/siobhancollins/FastFash.php");
    exit();
    
    
    }
 				 
 	else{
 		header("Location: http://danu6.it.nuigalway.ie/siobhancollins/registration.php");
 	}			
	

   
 	?>



 
 <h1>Registered</h1>

 <p>Thank you, you have registered - you may now login</a>.</p>
 
  <?php 

}
 else 
 {	
 echo $_SERVER['REQUEST_METHOD'];
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
		
<a href="#home" data-icon="home" data-iconpos="left" data-direction="reverse" class="ui-btn-left"
  		data-transition = "flip">Home</a>	
	
	<div data-role="content">
	
	
	
	<form id ="check-user" class="ui-body ui-body-a ui-corner-all" method="post" data-ajax='false' action="login.php">
		<fieldset>
			<div data-role ="fieldcontain">
			<h2>Login Information</h2>
			<label for="username" class="ui-hidden-accessible">Username:  </label><br>
			<input type="text" value="" name="username" id="username" placeholder="username...."/>
			</div>
			
			<div data-role="fieldcontain">
			<label for="pass" class="ui-hidden-accessible">Password:  </label><br>
			<input type="password" value="" name="pass" id="pass" placeholder="Password...."/>
			</div>
			
			
			<label for="log">Keep me logged in</label><br />
			<input type="checkbox" name="login" id="log" value="1" data-mini="true"/><br>
			<input type="submit" name="submit" id ="submit" value="Submit" data-theme="b" data-icon="check" data-iconpos="right" data-inline="true">
		
		
		</fieldset>	
	</form>
	
<!-- end content --> 	
</div>
	
	
	
<!-- end page --> 
</div>	
	
</body>
</html>
