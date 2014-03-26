//profile system, backend file


<?php

session_start();


/* Selects the customers message from the database and prints to the screen */
$mysqli = new mysqli("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}



//Include FULL SERVER PATH /HOME/USER.... and point to file it is used in.
//dirname removes filename function to include file user.inc
$path = dirname('_FILE_');

include('user.inc.php');

//Simulate user logged in, when they log in and out
$_SESSION['uid'] = 1;
if(isset($_SESSION['uid']))
$_SESSION['uid']=$_SESSION['uid']+1;
else
$_SESSION['uid']=1;
echo "Views=". $_SESSION['uid'];

?>