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

 if (isset($_POST['submit'])) { 



 //This makes sure they did not leave any fields blank

 if (!$_POST['username'] || !$_POST['pass'] || !$_POST['pass2']) {

 		die('You did not complete all of the required fields');

 	}



 // checks if the username is in use

 	if (!get_magic_quotes_gpc()) {

 		$_POST['username'] = addslashes($_POST['username']);
		
 	}

	

    $check = mysqli_query($link, "SELECT * FROM closet WHERE username='{$_POST['username']}' AND pass='{$_POST['pass']}';");
    $usercheck = $_POST['username'];
	$check2 = mysqli_num_rows($check);



 //if the name exists it gives an error

 if ($check2 != null) {
		echo "logged on!";
 		die('Sorry, the username '.$_POST['username'].' is already in use.');
	
 				}


  
//this makes sure both passwords entered match

 	if ($_POST['pass'] != $_POST['pass2']) {

 		die('Your passwords did not match. ');

 	}
	
   


 	// encrypt passwords

 	$_POST['pass'] = md5($_POST['pass']);

 	if (!get_magic_quotes_gpc()) {

 		$_POST['pass'] = addslashes($_POST['pass']);

 		$_POST['username'] = addslashes($_POST['username']);

 			}



 // now we insert it into the database


 	$username = $link->escape_string($_POST['username']);
	$pass = $link->escape_string($_POST['pass']);
	$email = $link->escape_string($_POST['email']);
	$lastname = $link->escape_string($_POST['lastname']);
	$firstname = $link->escape_string($_POST['firstname']);
	

	
 
	$sql = "INSERT INTO closet (username, pass, email, lastname, firstname) VALUES ('{$username}','{$pass}', '{$email}', '{$lastname}','{$firstname}');";
	$link->query($sql);
	
	
	
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
    
   
 	?>



 
 <h1>Registered</h1>

 <p>Thank you, you have registered - you may now login</a>.</p>
 
  <?php 
 } 

 else 
 {	
 ?>


 
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

 <table border="0">

 <tr><td>Username:</td><td>

 <input type="text" name="username" maxlength="60">

 </td></tr>

 <tr><td>Password:</td><td>

 <input type="password" name="pass" maxlength="10">

 </td></tr>

 <tr><td>Confirm Password:</td><td>

 <input type="password" name="pass2" maxlength="10">

 </td></tr>
 

 <tr><td>FirstName:</td><td>

 <input type="text" name="firstname" maxlength="60">

 </td></tr>

<tr><td>LastName:</td><td>

 <input type="text" name="lastname" maxlength="60">

 </td></tr>
 
 <tr><td>email:</td><td>

 <input type="text" name="email" maxlength="60">

 </td></tr>
 <tr><th colspan=2><input type="submit" name="submit" 
value="Register"></th></tr> </table>

 </form>


 <?php

 }
 ?> 