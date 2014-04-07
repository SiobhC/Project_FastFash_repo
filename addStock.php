<!--able to add to database image and name etc and description --->
<?php 


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


			
		if ($_POST['action']=="add") {
		
	/* Selects the stock from the database and prints to the screen */
$mysqli = new mysqli("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
		
	else{
		
	echo "<form action=addStock.php?pass=hello&action=update&id={$row['id']}' method='post'>";
	echo "Please modify the tables below to adjust for the items in stock:...";
	echo "<table border=1><tr><td>Name</td><td>Price</td><td>Image></td><td>Units in Stock</td><td>Description</td></tr>";
	
    echo "<tr><td><input type='text' name='name' ";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";
	
	echo "<td><input type='text' name='price'>";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";
    
    echo "<td><input name='content'  type=file>";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";
	
	
	echo "<td><input type='text' name='stock' >";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";
	
	
	echo "<td><input type='text' name='description' >";
    echo "<input type='hidden' name='id' value='{$_GET['id']}'>";
    echo "<input type='hidden' name='action' value='update'></td>";
	
	echo "<td><input type=submit id='submit' value='Submit'> </td></tr>";
	
	
    

		}
	}	
		
			
	}
	//header("Location: http://danu6.it.nuigalway.ie/siobhancollins/editStock.php?pass=hello");	

}



