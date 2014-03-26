<!-- able to insert a login with a password, if password mathches then query for manager is returned-->
<!-- Working tue march 18th march-->
<!-- works from database users2 -->
<! Join to table 'upload'. Match the ids in both tables for the users -->

<html>
<head>
    <title>jQuery Mobile page</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


	<link rel="stylesheet" href="themes/style_march.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" />
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>


	<script type="text/javascript" src="/Users/admin/Documents/1.0.11/simple-inheritance.min.js">
	<script type="text/javascript" src="/Users/admin/Documents/1.0.11/code-photoswipe-1.0.9.min.js">
	//NB you may have to change the location of this stylesheet to MAMP/test/jquery-mobile-.....

					
    
    <script type="text/javascript" src="/path/to/jquery.js"></script>
	<script type="text/javascript" src="/Applications/MAMP/htdoc/test/jquery.jcarousel.js"></script>
	
	
</head>
<body>
<?PHP
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$password = $_POST['password']; 

if ( $password == "7854hero" ) {


// Output: Password is valid!

$link = mysqli_connect("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}




/* Select queries return a resultset, selects customer first names */
if ($result = mysqli_query($link, "SELECT pass FROM users2")) {
    printf("\nThere has been %s passwords submitted. \n", mysqli_num_rows($result));

  
    mysqli_free_result($result);
}




/* Selects the customers message from the database and prints to the screen */
$mysqli = new mysqli("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$mysqli->real_query("SELECT id, username, firstname, lastname, pass, email,about FROM users2 ORDER BY id ASC");
$res = $mysqli->use_result();
echo '<form action="jquerymobile.php" method="post">';
echo "The submitted queries are:...\n";
echo "<table border=1><tr><td>FirstName</td><td>LastName</td><td>Username</td><td>About</td><td>Email</td></tr>";
while ($row = $res->fetch_assoc()) {
    echo "<tr><td>{$row['firstname']}</td>" ;
    echo "<td>{$row['lastname']}</td>" ;
    echo "<td>{$row['username']}</td>" ;
    echo "<td>{$row['about']}</td>" ;
    echo "<td>{$row['email']}</td>" ;

	echo "<td><input type=\"submit\" name=\"id[]\" value=\"{$row['id']}\" /> (Delete)</td></tr>";
    
}
echo "</table>";




//Delete replied to users where the value is 1
//$mysqli->real_query("DELETE FROM comments WHERE replied = '1'");





/* close connection */

mysqli_close($link);



}

else 
    echo 'Invalid password.';

?>
</body>
</html>


