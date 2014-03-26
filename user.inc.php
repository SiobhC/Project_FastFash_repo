<?php


//fetches all users from table
function fetch_users(){

	/* Selects the customers message from the database and prints to the screen */
	$mysqli = new mysqli("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");

	if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$mysqli -> real_query("SELECT user_id,user_username,user_firstname,user_lastname,user_about FROM users ORDER BY user_id ASC");
	$res = $mysqli->use_result();
	
	//put results into array
	$users = array();
	//Loop over query results, while true(there are results) assign to row and users array
	echo "<table border=1><tr><td>FirstName</td><td>LastName</td><td>Message</td><td>Email</td><td>About</td></tr>";
while ($row = $res->fetch_assoc()) {
    echo "<tr><td>{$row['user_id']}</td>" ;
    echo "<td>{$row['user_username']}</td>" ;
    echo "<td>{$row['user_firstname']}</td>" ;
    echo "<td>{$row['user_firstname']}</td>" ;
    echo "<td>{$row['user_about']}</td>" ;
	echo "<td><input type=\"submit\" name=\"user_id[]\" value=\"{$row['user_id']}\" /> (Delete)</td></tr>";
    
}
echo "</table>";

}

?>
<?php
/* 
//fetches profile information for the given user
function fetch_user_info($user_id) {
	$user_id = (int)$user_id;
	$mysqli-> real_query("SELECT 
				`user_username` AS `username`
				`user_firstname` AS `firstname`
				`user_lastname` AS `lastname`
				`user_email` AS `email`
				`user_about` AS `about`
				`user_location` AS `location`
				`user_gender` AS `gender`
				FROM `users`
				WHERE `user_id` = {$user_id}");
				
				$result = $mysqli->use_result();
				return $result->fetch_assoc();
				
}
*/
function fetch_user_info($uid){

	/* Selects the customers message from the database and prints to the screen */
	$mysqli = new mysqli("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");

	if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	else {
	$uid = (int)$uid;
	$mysqli -> real_query("SELECT user_id,user_username,user_firstname,user_lastname,user_about FROM users WHERE user_id = {$uid}");
	$result = $mysqli->use_result();
	return  $result->fetch_assoc();
	
	
}
}

	
	
?>
//mysqli_close($mysqli);




