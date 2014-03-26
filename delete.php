//delete file, should be modified to add text to user comments and delete comments from database

<?php require_once('top.phtml'); ?>

<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the 'players' table
*/

 // connect to the database
 include('showContactUs.php');
 if ($_SERVER["REQUEST_METHOD"] == "POST"){

 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['replied']) && is_numeric($_GET['replied']))
 {
 // get replied value
 $replied = $_GET['replied'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM comments WHERE replied=$replied")
 or die(mysql_error()); 
 }
 // redirect back to the view page
 header("Location: showContactUs.php");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: showContactUs.php");
 }

?>

<?php require_once('bottom.phtml'); ?>
