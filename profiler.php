<?php


/* Selects the customers message from the database and prints to the screen */
$mysqli = new mysqli("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
 
if ($_GET['pass'] != "hello") 
	{
		 echo 'Invalid password.';
   				 
   	}

else if (!(isset($_GET['id'])) &&  !(isset($_POST['id']))  ) 

	{
		 echo 'Invalid id.';
   				 
   	}
   	else
{
if(isset($_POST['action'])){
	if ($_POST['action']=="update") {
		
		$mysqli->real_query("UPDATE users2 SET firstname='{$_POST['firstname']}',username='{$_POST['username']}',lastname='{$_POST['lastname']}',pass='{$_POST['pass']}'about='{$_POST['about']}',email='{$_POST['email']}' WHERE id={$_POST['id']};");
			header("Location: http://danu6.it.nuigalway.ie/siobhancollins/jquerymobile_old.php?pass={$_POST['pass']}");
}

}
else if($_GET['action']=="delete") {
		
		$mysqli->real_query("DELETE FROM users2 WHERE id={$_GET['id']};");
		header("Location: http://danu6.it.nuigalway.ie/siobhancollins/login.php");
		
	
}else if($_GET['action']=="edit") {
		
		$mysqli->real_query("SELECT * FROM users2 where id={$_GET['id']};");
$res = $mysqli->use_result();
echo '<form action="jquerymobile_old.php?pass=$_POST['pass']" method="post">';
echo "Please modify the tables below to adjust for the users:...";
echo "<table border=1><tr><td>Firstname</td><td>Lastname</td><td>Username</td><td>Email</td><td>about</td><td>Submit</td></tr>";
while ($row = $res->fetch_assoc()) {
    echo "<tr><td><input type='text' name='firstname' value='{$row['firstname']}'>";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";
    
    echo "<tr><td><input type='text' name='lastname' value='{$row['lastname']}'>";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";
    
    echo "<tr><td><input type='text' name='username' value='{$row['username']}'>";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";
	
	
	echo "<td><input type='text' name='email' value='{$row['email']}'>";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";
	
	
	echo "<td><input type='text' name='about' value='{$row['about']}'";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";
	
	
	echo "<td><input type='text' name='description' value='{$row['description']}'>";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";
    
	echo "<td><input type=submit data-role='button' data-icon='plus'></td></tr>";
    
}
echo "</table>";
	
}
?>