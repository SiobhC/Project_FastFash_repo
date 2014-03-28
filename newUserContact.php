<!DOCTYPE html>
<html>
<head>
    <title>jQuery Mobile page</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />

	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.1/jquery.mobile-1.4.1.min.js"></script> 

	<script type="text/javascript" charset="utf-8" src="cordova-2.2.0.js"></script>
    <script type="text/javascript" charset="utf-8">
	
	
	
	<script type="text/javascript" src="/Users/admin/Documents/1.0.11/simple-inheritance.min.js">
	<script type="text/javascript" src="/Users/admin/Documents/1.0.11/code-photoswipe-1.0.9.min.js">
	//NB you may have to change the location of this stylesheet to MAMP/test/jquery-mobile-.....

					
    
    <script type="text/javascript" src="/path/to/jquery.js"></script>
	<script type="text/javascript" src="/Applications/MAMP/htdoc/test/jquery.jcarousel.js"></script>
	
	
</head>



<?php
 
if(isset($_POST['email'])) {
 
     
 
    
 
    $email_to = "s.collins9@nuigalway.ie";
 
    $email_subject = "Query";
 
     
 
     
 
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
        
        !isset($_POST['email']) ||
 
        !isset($_POST['about'])) {
 
        died('There appears to be some errors in the form you submitted.');       
 
    }
 
     
 
    $user_firstname = $_POST['firstname']; 
 
    $user_lastname = $_POST['lastname']; 
 
 	$user_username = $_POST['username']; 
 	
    $user_email = $_POST['email']; 
  
    $user_about  = $_POST['about']; 
     
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
 
  if(strlen($about) < 5) {
 
    $error_message .= 'The about section you entered do not appear to be valid and need to have more than 25 characters.<br />';
 
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
    
    $email_message .= "About: ".clean_string($about)."\n";
    
    $email_message .= "Username: ".clean_string($username)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 echo "Thank you for contacting us. We will be in touch with you very soon.";



$link = mysqli_connect("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/*// sql query for CREATE TABLE
$sql = "INSERT INTO `comments` (
 `message_id`,
 `name`,
 `message`,
 `email`,
 `category`,
 `replied`,
 `date_added`
  
 )"; 

 Performs the $sql query on the server to create the table
if ($link->query($sql) === TRUE) {
  echo 'Table "comments" added created';
}
else {
 echo 'Error: '. $link->error;
}
*/





/* prepare statement */
if ($stmt = mysqli_prepare($link, "INSERT INTO users2  (firstname,lastname, username,email,pass,about) VALUES('{$_POST['firstname']}','{$_POST['lastname']}','{$_POST['username']}','{$_POST['email']}',md5('{$_POST['pass']}'),'{$_POST['about']}');")) {
	$stmt->execute();
    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
        printf("%s %s %s \n",$_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['pass'],$_POST['username'], $_POST['about']);
    }

    /* close statement */
    mysqli_stmt_close($stmt);
}





/* close connection */

mysqli_close($link);
?>
 
 
<?php
 
}
 
?>

<dl>
<!-- Paragraph styled with specific padding-->
	<p class="padding"> Contact us, we are happy to help!:</p>


	<dt>Sales assistants:</dt>
	<dd>091-565254 <br>
	sales_shoezz@gmail.com
	</dd>

	<dt>Fulfillment Executive:</dt>
	<dd>091-565255<br>
	mark_shoezz@gmail.com
	</dd>

	<dt>Marketing Officer:</dt>
	<dd>091-565256<br>
	peter_shoezz@gmail.com
	</dd>

	<dt>Secretary:</dt>
	<dd>091-565257<br>
	linda_shoezz@gmail.com
	</dd>
	
	
</dl>

	<a href="">
	<br>
	<select name="queries" form="myform">
  	<option value="Sales">Sales</option>
  	<option value="Returns">Returns</option>
  	<option value="Shipping">Shipping</option>
  	<option value="Stock">Stock</option>
  	</select>
	<br><br>
	</a>


<fieldset>
<legend>Please fill in your Username and Password:</legend>
<form name="contactform" method="post" action="" <?php echo $_SERVER["PHP_SELF"];?>">
<table width="450px">


<tr>
<td valign="top"><label for="firstname">First Name *</label></td>
<td valign="top"><input  type="text" name="firstname" maxlength="50" size="30"></td>
</tr>

<tr>
<td valign="top""><label for="lastname">Last Name *</label></td>
<td valign="top"><input  type="text" name="lastname" maxlength="50" size="30"></td>
</tr>


<tr>
<td valign="top"><label for="username">UserName *</label></td>
<td valign="top"><input  type="text" name="username" maxlength="50" size="30"></td>
</tr>

<tr>
<td valign="top"><label for="pass">Password *</label></td>
<td valign="top"><input  type="text" name="pass" maxlength="50" size="30"></td>
</tr>

<tr>
<td valign="top"><label for="email">Email Address *</label></td>
<td valign="top"><input  type="text" name="email" maxlength="80" size="30"></td>
</tr>


<tr>
<td valign="top"><label for="about">About *</label></td>
<td valign="top"><textarea  name="about" maxlength="500" cols="25" rows="6"></textarea></td>
</tr>

<tr>
<td colspan="2" style="text-align:center"><a href=""> <input type="submit" id="submit" value="Submit"></a></td>
</tr>

</form>
</table>
</fieldset>






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
