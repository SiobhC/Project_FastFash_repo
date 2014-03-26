<?php 
session_start();

$username = $_POST['username'];
$pass = md5($_POST['pass']);
$mysqli_db_hostname = "danu6.it.nuigalway.ie";
$mysqli_db_user = "mydb1396cs";
$mysqli_db_password = "da1sus";
$mysqli_db_database = "mydb1396";
$con = mysqli_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password)
or die("Could notconnect database");
mysqli_select_db($mysql_db_database, $con)or die("Could not select database");

$query = "SELECT * FROM users2 WHERE username='$username' AND pass='$pass'";
$result = mysqli_query($query)or die(mysql_error());
$num_row = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
if( $num_row >=1 ) { 
echo 'true';
$_SESSION['username']=$row['username'];
}
else{
echo 'false';
}
?>



