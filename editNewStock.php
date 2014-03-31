

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
	
		$mysqli->real_query("UPDATE products SET name='{$_POST['name']}',name='{$_POST['name']}', price='{$_POST['price']}',stock='{$_POST['stock']}',description='{$_POST['description']}' WHERE id={$_POST['id']};");
			header("Location: http://danu6.it.nuigalway.ie/siobhancollins/editStock.php?pass=hello");
			}

}


else if($_GET['action']=="delete") {
		
		$mysqli->real_query("DELETE FROM products WHERE id={$_GET['id']};");
		header("Location: http://danu6.it.nuigalway.ie/siobhancollins/editStock.php?pass=hello");
		
	}else if($_GET['action']=="edit") {
		
		$mysqli->real_query("SELECT * FROM products where id={$_GET['id']};");
$res = $mysqli->use_result();
echo '<form action="editNewStock.php?pass=hello" method="post">';
echo "Please modify the tables below to adjust for the items in stock:...";
echo "<table border=1><tr><td>Name</td><td>Price</td><td>Units in Stock</td><td>Description</td></tr>";
while ($row = $res->fetch_assoc()) {
    echo "<tr><td><input type='text' name='name' value='{$row['name']}'>";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";
	
	
	echo "<td><input type='text' name='price' value='{$row['price']}'>";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";

	
	echo "<td><input type='text' name='stock' value='{$row['stock']}'";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";
	
	
	echo "<td><input type='text' name='description' value='{$row['description']}'>";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";
	echo "<td><input type=submit> </td></tr>";
    
}
echo "</table>";
	
}








/* close connection */

//mysqli_close($link);




}

?>
