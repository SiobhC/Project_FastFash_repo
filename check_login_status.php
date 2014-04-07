<!-- ******** check_login_status.php ******** -->

<?php
session_start();
include_once("databaseconnect.php");
// Files that inculde this file at the very top would NOT require 
// connection to database or session_start(), be careful.
// Initialize some vars
$user_ok = false;
$log_id = "";
$log_username = "";
$log_password = "";
// User Verify function
function evalLoggedUser($conx,$id,$u,$p){
	$sql = "SELECT ip FROM clsoet WHERE userID='$id' AND username='$u' AND pass='$p' AND activated='1' LIMIT 1";
    $query = mysqli_query($conx, $sql);
    $numrows = mysqli_num_rows($query);
	if($numrows > 0){
		echo "here !";
		return true;
	}
}
if(isset($_SESSION["userID"]) && isset($_SESSION["username"]) && isset($_SESSION["pass"])) {
	$log_id = preg_replace('#[^0-9]#', '', $_SESSION['userID']);
	$log_username = preg_replace('#[^a-z0-9]#i', '', $_SESSION['username']);
	$log_password = preg_replace('#[^a-z0-9]#i', '', $_SESSION['pass']);
	// Verify the user
	$user_ok = evalLoggedUser($db_conx,$log_id,$log_username,$log_password);
} else if(isset($_COOKIE["userID"]) && isset($_COOKIE["username"]) && isset($_COOKIE["pass"])){
	$_SESSION['userID'] = preg_replace('#[^0-9]#', '', $_COOKIE['userID']);
    $_SESSION['username'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['username']);
    $_SESSION['pass'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['pass']);
	$log_id = $_SESSION['userID'];
	$log_username = $_SESSION['username'];
	$log_password = $_SESSION['pass'];
	// Verify the user
	$user_ok = evalLoggedUser($db_conx,$log_id,$log_username,$log_password);
	echo "Reachinh here!";
	if($user_ok == true){
		// Update their lastlogin datetime field
		$sql = "UPDATE closet SET lastlogin=now() WHERE id='$log_id' LIMIT 1";
        $query = mysqli_query($db_conx, $sql);
	}
}
?>