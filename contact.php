//Original working version 15.31
<?php require_once('top.phtml'); ?>

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
 
    if(!isset($_POST['first_name']) ||
 
        !isset($_POST['last_name']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['comments'])) {
 
        died('There appears to be some errors in the form you submitted.');       
 
    }
 
     
 
    $first_name = $_POST['first_name']; 
 
    $last_name = $_POST['last_name']; 
 
    $email_from = $_POST['email']; 
  
    $comments = $_POST['comments']; 
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($comments) < 25) {
 
    $error_message .= 'The Comments you entered do not appear to be valid and need to have more than 25 characters.<br />';
 
  }
   if(strlen($email_from) < 10) {
 
    $error_message .= 'The email you entered do not appear to be valid and need to have more than 10 characters.<br />';
 
  }
  if(strlen($first_name) < 10) {
 
    $error_message .= 'The name entered must contain more than 10 valid characters.<br />';
 
  }

 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
 
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Comments: ".clean_string($comments)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 echo "Thank you for contacting us. We will be in touch with you very soon.";
 
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
	<legend>Please fill in your details:</legend>

<form name="contactform" method="post" action="" <?php echo $_SERVER["PHP_SELF"];?>">
<table width="450px">


<tr>

 <td valign="top">

  <label for="first_name">First Name *</label>

 </td>

 <td valign="top">

  <input  type="text" name="first_name" maxlength="50" size="30">

 </td>

</tr>

<tr>

 <td valign="top"">

  <label for="last_name">Last Name *</label>

 </td>

 <td valign="top">

  <input  type="text" name="last_name" maxlength="50" size="30">

 </td>

</tr>

<tr>

 <td valign="top">

  <label for="email">Email Address *</label>

 </td>

 <td valign="top">

  <input  type="text" name="email" maxlength="80" size="30">

 </td>

</tr>


<tr>

 <td valign="top">

  <label for="comments">Comments *</label>

 </td>

 <td valign="top">

  <textarea  name="comments" maxlength="500" cols="25"
  rows="6"></textarea>

 </td>

</tr>

<tr>

 <td colspan="2" style="text-align:center">

 <a href=""> <input type="submit" value="Submit"></a>

 </td>

</tr>
</form>
</table>
</fieldset>


<?php require_once('top.phtml'); ?>