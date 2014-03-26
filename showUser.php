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
$q = intval($_GET['q']);

$con = mysqli_connect("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "test");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM user WHERE user_id = '".$q."'";

$result = mysqli_query($con,$sql);




echo "<table border=1><tr><td>FirstName</td><td>LastName</td><td>Message</td><td>Email</td><td>Replied</td></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['user_firstname']}</td>" ;
    echo "<td>{$row['user_lastname']}</td>" ;
    echo "<td>{$row['user_username']}</td>" ;
    echo "<td>{$row['user_email']}</td>" ;
    echo "<td>{$row['user_about']}</td></tr>" ;
	//echo "<td><input type=\"submit\" name=\"message_id[]\" value=\"{$row['message_id']}\" /> (Delete)</td></tr>";
    
}
echo "</table>";

mysqli_close($con);
?>

</body>
</html>