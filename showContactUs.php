<!-- able to insert a login with a password, if password mathches then query for manager is returned-->
<!-- Working 4pm fri 7th march-->

<?php require_once('top.phtml'); ?>



<div id="main">
Please  login in here: <br>

<form action='showContactUs.php' method="POST">
Name:<input name="publicName"><br>
Login:<input name="login"><br>
Password:<input name="password"><br>
<input type =submit value ='Login' action=>

</form>

<?php 
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){

$password = $_POST['password']; 

if ( $password == "hello" ) {


// Output: Password is valid!

$link = mysqli_connect("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}




/* Select queries return a resultset, selects customer first names */
if ($result = mysqli_query($link, "SELECT messages FROM comments")) {
    printf("\nThere has been %d messages submitted. \n", mysqli_num_rows($result));

  
    mysqli_free_result($result);
}




/* Selects the customers message from the database and prints to the screen */
$mysqli = new mysqli("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$mysqli->real_query("SELECT message_id,first_name,last_name,message,email,replied FROM comments ORDER BY message_id ASC");
$res = $mysqli->use_result();
echo '<form action="showContactUs.php" method="post">';
echo "The submitted queries are:...\n";
echo "<table border=1><tr><td>FirstName</td><td>LastName</td><td>Message</td><td>Email</td><td>Replied</td></tr>";
while ($row = $res->fetch_assoc()) {
    echo "<tr><td>{$row['first_name']}</td>" ;
    echo "<td>{$row['last_name']}</td>" ;
    echo "<td>{$row['message']}</td>" ;
    echo "<td>{$row['email']}</td>" ;
    echo "<td>{$row['replied']}</td>" ;
	echo "<td><input type=\"submit\" name=\"Delete\" value=\"{$row['replied']}\" /> (Delete)</td></tr>";
    
}
echo "</table>";




//Delete replied to users where the value is 1
$mysqli->real_query("DELETE FROM comments WHERE replied = '1'");





/* close connection */

mysqli_close($link);




}
else {
    echo 'Invalid password.';
}
}
?>



<?php require_once('bottom.phtml'); ?>
