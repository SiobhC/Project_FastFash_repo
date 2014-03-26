<!-- able to insert a login with a password, if password mathches then query for manager is returned-->
<!-- Working 4pm fri 7th march-->

<?php require_once('top.phtml'); ?>
<style>	
table, td, th
{

border:1px 
color:#58E000;
}
th
{
background-color:#F43D6B;
color:#E9003A;

}

</style>


<script>
var password = "<? echo $_GET['pass'];  ?>";
	function updateStock(id){
		var txtbox = document.getElementById("description" + pk);
	var url = "editStock.php?pass="+password+"&action=update&id="+id+"&description="+txtbox.value;
	window.location= url;
	}
	
	function deleteStock(id){
		var url="editStock.php?pass="+password+"&action=delete+&id="+id;
		window.location=url;
	}	


</script>



<?php 
 
if ($_GET['pass'] != "hello")
	{
		 echo 'Invalid password.';
   				 
   	}
   	
else   				 
{


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

$mysqli->real_query("SELECT id, name,price,stock,image,description FROM products ORDER BY id ASC");
$res = $mysqli->use_result();
echo '<form action="editStock.php" method="post">';
echo "The items currently in stock are:...";
echo "<table border=1><tr><td>Name</td><td>Price</td><td>Units in Stock</td><td>Image</td><td>Description</td><td>Delete</td><td>Edit</td></tr>";
while ($row = $res->fetch_assoc()) {
    echo "<tr><td>{$row['name']}</td>";
    echo "<td>&#8364;{$row['price']}</td>" ;
    echo "<td>{$row['stock']}</td>" ;
    echo "<td><img class='thumbnail' src={$row['image']} width='200' height='150' /></td>" ;
    echo "<td>{$row['description']}</td>" ;
	//echo "<td><input type=button value='delete' onClick='deleteStock({$row['id']});'> </td>";
	echo "<td><a href='editNewStock.php?pass=hello&action=delete&id={$row['id']}'>Delete</a></td>";
	echo "<td><a href='editNewStock.php?pass=hello&action=edit&id={$row['id']}'>Edit</a></td>";
	//echo "<td><input type=button value='update' onClick='updateStock({$row['id']});'> </td></tr>";
    
}
echo "</table>";



/* close connection */

mysqli_close($link);




}

?>



<?php require_once('bottom.phtml'); ?>


