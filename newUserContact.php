
<?php
 
if(isset($_POST['submit'])) {
 
     
 
     // Connects to the  Database closet where there is information about specific users


	$link = mysqli_connect("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");

	/* check connection */
	if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
	}
	
		
	//Select username and password from database matching the inputted username and password.
	//If the number of rows > 0, that username and password already exist.
    $check = mysqli_query($link, "SELECT * FROM closet WHERE username='{$_POST['username']}' AND pass='{$_POST['pass']}';");
    $usercheck = $_POST['username'];
	$check2 = mysqli_num_rows($check);
	
	

 
    $email_to = "s.collins9@nuigalway.ie";
 
    $email_subject = "Query";
 
 	
//get_magic_quotes adds backslashes to the inputted form data, therefore increasing security for app
//and stopping the user from droping or modifying the database
 	if (!get_magic_quotes_gpc()) {

 		$_POST['username'] = addslashes($_POST['username']);
 		$_POST['pass'] = addslashes($_POST['pass']);
 		$_POST['firstname'] = addslashes($_POST['firstname']);
 		$_POST['lastname'] = addslashes($_POST['lastname']);
		
 	}


	
$query = mysqli_query($link,"SELECT username FROM closet WHERE username='".$_POST['username']."'");	
	 if (mysqli_num_rows($query) != 0)
  {		
       die("Username already exists");
        header("Location: http://danu6.it.nuigalway.ie/siobhancollins/login.php");
    exit();
     
  }



 //if the name exists it gives an error, as user already exists in database or username is not original
 // checks if the username is in use
 if ($check2 != null) {
		
 		die('Sorry, the username '.$_POST['username'].' is already in use.');
		 header("Location: http://danu6.it.nuigalway.ie/siobhancollins/login.php");	
 				}


  
//this makes sure both passwords entered match

 	if ($_POST['pass'] != $_POST['pass2']) {

 		die('Your passwords did not match. ');

 	}
	
   


 	// encrypt passwords using md5

 	$_POST['pass'] = md5($_POST['pass']);




 

	//Retrieve table data and assign to variables database
 	$username = $link->escape_string($_POST['username']);
	$pass = $link->escape_string($_POST['pass']);
	$email = $link->escape_string($_POST['email']);
	$lastname = $link->escape_string($_POST['lastname']);
	$firstname = $link->escape_string($_POST['firstname']);
	//$id = $link->escape_string($_POST['id']);
	

     
 
     function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['firstname']) ||
 
        !isset($_POST['lastname']) ||
 
        !isset($_POST['username']) ||
        
        !isset($_POST['pass']) ||
        
        !isset($_POST['email'])) {
 
        died('There appears to be some errors in the form you submitted.');       
 
    }
 
     
 
    $user_firstname = $_POST['firstname']; 
 
    $user_lastname = $_POST['lastname']; 
 
 	$user_username = $_POST['username']; 
 	
    $user_email = $_POST['email']; 
  
     
	$user_password  = $_POST['pass']; 
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp, $firstname )) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp, $lastname )) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
 

   if(strlen($email) < 5) {
 
    $error_message .= 'The email you entered do not appear to be valid and need to have more than 10 characters.<br />';
 
  }
  if(strlen($firstname) < 1) {
 
    $error_message .= 'The name entered must contain more than 1 valid characters.<br />';
 
  }
   if(strlen($lastname) < 1) {
 
    $error_message .= 'The name entered must contain more than 1 valid characters.<br />';
 
  }
   if(strlen($username) < 5) {
 
    $error_message .= 'The username entered must contain more than 5 characters.<br />';
 
  }

   if(strlen($pass) < 5) {
 
    $error_message .= 'The pasword entered must contain more than 5 characters.<br />';
 
  }

 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($firstname)."\n";
 
    $email_message .= "Last Name: ".clean_string($lastname)."\n";
 
    $email_message .= "Email: ".clean_string($email)."\n";
 
    $email_message .= "password: ".clean_string($pass)."\n";
    
    $email_message .= "Username: ".clean_string($username)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 echo "Thank you for contacting us. We will be in touch with you very soon.";








 //This makes sure they did not leave any fields blank

 if (!$_POST['username'] || !$_POST['pass'] || !$_POST['pass2']) {

 		die('You did not complete all of the required fields');

 	}




	
 	// now we insert it into the database
	$sql = "INSERT INTO closet (username, pass, email, lastname, firstname) VALUES ('{$username}','{$pass}', '{$email}', '{$lastname}','{$firstname}');";
	$link->query($sql);
	
	
	
	// If all the data is ok and has been checked against the DB, start the session.Store username and password for the user.
	//Relocate th euser to the opening page of FastFash.php
	session_start();
	$username = $_POST['username'];
	$pass = $_POST['pass'];
    setcookie("username", $username, time()+7200);
    setcookie("pass", $pass, time()+7200);
    //setcookie("id", $id, time()+7200);
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['pass'] = $_POST['pass'];
    $_SESSION['login'] = "1";
    //$_SESSION['id'] = "1";
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (60 * 60 * 60);
   	header("Location: http://danu6.it.nuigalway.ie/siobhancollins/FastFash.php");
    exit();

} 

//else form has not been posted and the HTML form can now be posted to user to collect parameters 
 else 
 {	
 ?><!DOCTYPE html>
<html>
<head>
    <title>jQuery Mobile page</title>
    
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>

    
    <script type="text/javascript" src="/path/to/jquery.js"></script>
	<script type="text/javascript" src="/Applications/MAMP/htdoc/test/jquery.jcarousel.js"></script>
	


</head>


<body>

<!--Registration page -->
<div data-role="page" >
		<div data-role="header">
			<h2 id="banner">FastFash!</h2>
		</div>

<!-- header that includes a link to login page for already registerested users-->
		
<a rel="external" href="login.php" data-icon="home" data-iconpos="left" data-direction="reverse" class="ui-btn-left" data-transition = "flip">Login</a>	
	
	<div data-role="content">
	

<!--Form to collect information from the user. Posts to same page -->
 			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" data-ajax='false'">
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
 
 				<tr><td>Email:</td><td>
				<input type="text" name="email" maxlength="60">
				</td></tr>
 
 				<tr><th colspan=2><input type="submit" name="submit" value="Register"></th></tr> 
 			</table>

 </form>
 
<!-- end content --> 	
</div>
	
	
	
<!-- end page --> 
</div>	
	

</body>
</html>

<?php

 }
 ?> 






</div>


<script>
	$(document).ready(function(){
		$("#register").click(function(){
			var user_username = $("#username").val();
			var user_password = $("#pass").val();
			var userExists = localStorage.getItem("username");
			
			if(userExists && user_username == userExists) {
				alert("Error: "+userExists+" already exists");
				}
				else{
				alert("Saving "+user_username+" /" + email" + to local storage"):
				console.log("Saving " + username + "/" +email+ " to local storage"):
				localStorage.setItem("username", username);
				localStorage.setItem("email", email);
				}
			});
			});
</script>

</body>
</html>
