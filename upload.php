<?php 
//connect to database. Username and password need to be changed 
mysqli_connect("danu6.it.nuigalway.ie", "mydb1396cs", "da1sus", "mydb1396"); 

//Select database, database_name needs to be changed 
//mysql_select_db("database_name"); 

if (!$_POST['uploaded']){ 
//If nothing has been uploaded display the form 
?> 

<form action="<? echo $_SERVER['PHP_SELF']; ?>" method="post"  
ENCTYPE="multipart/form-data"> 
Upload:<br><br> 
<input type="file" name="image"><br><br> 
<input type="hidden" name="uploaded" value="1"> 
<input type="submit" value="Upload"> 
</form> 

<?php 
}else{ 
//if the form hasn't been submitted then: 

//from here onwards, we are copying the file to the directory you made earlier, so it can then be moved  
//into the database. The image is named after the persons IP address until it gets moved into the database 

//get users IP 
$ip=$REMOTE_ADDR; 

//don't continue if an image hasn't been uploaded 
if (!empty($image)){ 

//copy the image to directory 
copy($image, "./pictures/".$ip.""); 

//open the copied image, ready to encode into text to go into the database 
$filename1 = "./pictures/".$REMOTE_ADDR; 
$fp1 = fopen($filename1, "r"); 

//record the image contents into a variable 
$contents1 = fread($fp1, filesize($filename1)); 

//close the file 
fclose($fp1); 

//encode the image into text 
$encoded = chunk_split(base64_encode($contents1));  

//insert information into the database 
mysqli_query("INSERT INTO images2 (img,data)"."VALUES ('NULL', '$encoded')"); 

//delete the temporary file we made 
unlink($filename1); 
} 

//end 
} 
?>