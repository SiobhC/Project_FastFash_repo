<?PHP

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

	header ("Location: http://danu6.it.nuigalway.ie/siobhancollins/login.php");

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>jQuery Mobile page</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>

	
	<script type="text/javascript" src="/Users/admin/Documents/1.0.11/simple-inheritance.min.js">
	<script type="text/javascript" src="/Users/admin/Documents/1.0.11/code-photoswipe-1.0.9.min.js">
	<!-- NB you may have to change the location of this stylesheet to MAMP/test/jquery-mobile-..... -->

					
    
    <script type="text/javascript" src="/path/to/jquery.js"></script>
	<script type="text/javascript" src="/Users/admin/Documents/html_files/jcarousel-0.3.0"></script>
	
	
	
	
	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
	
</head>
<script>
var password = "<? echo $_GET['pass'];  ?>";
	function updateStock(id){
		var txtbox = document.getElementById("description" + pk);
	var url = "edittrends.php?pass="+password+"&action=update&id="+id+"&description="+txtbox.value;
	window.location= url;
	}
	
	function deleteStock(id){
		var url="edittrends.php?pass="+password+"&action=delete+&id="+id;
		window.location=url;
	}	


</script>
<body>
<!--Trends ----------------------------------->


<div data-role="page" id="Trends">
  	<div data-role="header" data-position ="fixed">
  		<a rel="external" href="FastFash.php" data-icon="home" data-iconpos="left" data-direction="reverse" class="ui-btn-left"
  		data-transition = "flip">Home</a>
  		<a href="#" class="ui-btn ui-icon-search ui-btn-icon-left ui-corner-all ui-shadow" data-transition = "flip">Search</a>
  

    	<h1>Welcome To My Trends Page</h1>
  	</div>
  	
  	
  	<!--Navigation bar ----------------------------------->
  	 <div data-role="navbar">
      <ul>
    	<li><a rel="external" href="FastFash.php#Outfit">Outfit of the Day</a>
        <li><a rel="external" href="Closet.php?pass=hello">Closet Profile</a></li>
      </ul>
    </div>
  	
  	
  	<!--Popup ----------------------------------->
<div data-role="main" class="ui-content">
    <a href="#myPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all">Hi there!</a>

    <div data-role="popup" id="myPopup" class="ui-content">
      <h3>Welcome to Trends page!</h3>
      <p>This page shows all the trends from the Spring/Summer 2014 collection</p>
  </div>
</div>



<!-- body style="background-color:#d7d7d7" -->
	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="data1/images/prada.jpg" alt="prada" title="prada" id="wows1_0"/>Prada Sping Summer 2014</li>
<li><a href="http://www.cosmopolitan.co.uk/fashion/shopping/spring-summer-fashion-trends-2014?page=2"><img src="data1/images/ss14trendsfloralwilliamsonde.png" alt="Floral Trends" title="Floral Trends" id="wows1_1"/></a>Floweral spin on the runaways this season!</li>
<li><a href="http://www.cosmopolitan.co.uk/fashion/shopping/spring-summer-fashion-trends-2014?page=3"><img src="data1/images/ss14trendspinkgilesde.png" alt="Pink Everything!" title="Pink Everything!" id="wows1_2"/></a>Pink is all in this season, so stock up!</li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="prada"><img src="data1/tooltips/prada.jpg" alt="prada"/>1</a>
<a href="#" title="Floral Trends"><img src="data1/tooltips/ss14trendsfloralwilliamsonde.png" alt="Floral Trends"/>2</a>
<a href="#" title="Pink Everything!"><img src="data1/tooltips/ss14trendspinkgilesde.png" alt="Pink Everything!"/>3</a>
</div></div>
<span class="wsl"><a href="http://wowslider.com">Website Slideshow</a> by WOWSlider.com v5.2m</span>
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
	
	<!--Images ----------------------------------->
	<div data-role="content">
	

		<div class="jcarousel">	
    	<ul>
        	<li><img id ="prada" src="prada.jpg" width="150" height="150" /><h3> New Prada heels</h3></li>
        	<li><img id ="kurt_geiger" src="kurt_geiger.jpg" width="150" height="150" /><h3>Kurt Geiger latest offerings</h3></li>
        	<li><img id ="hunter" src="hunter.jpg" width="150" height="150" /><h3> Hunter wellies!</h3></li>
   		 </ul>
		</div>
		<p>This is page two and should contain all the information about trends</p>
    </div>
    
   <!--Thumbnail List view -----------------------------------> 
    <h4>Thumbnail List View</h4>

	<ul data-role="listview">
  		<li>
   		 	<a href="target.html">
     	 	<img src="prada.jpg" />
      		<h3>Prada Heels</h3>
      		<p>Blue Prada Spring/Summer2014<p>
   		 	</a>
  		</li>
  	
  		<li>
    		<a href="target.html">
      		<img src="kurt_geiger.jpg" />
      		<h3>Kurt Geiger Heels</h3>
      		<p>Kurt Geiger Spring/Summer2014</p>
    		</a>
  		</li>
  
  		<li>
    		<a href="target.html">
      		<img src="hunter.jpg" />
      		<h3>Hunter</h3>
      		<p>Hunter Wellington Army Green Boots</p>
    		</a>
  		</li>
	</ul>


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

$mysqli->real_query("SELECT id, name,price,url,image,description FROM trends ORDER BY id ASC");
$res = $mysqli->use_result();
echo '<form action="TrendTest.php" method="post">';
echo "The items currently trending are:...";
//echo "<table border=0><tr><td>Name</td><td>Delete</td><td>Edit</td><td>Add</td></tr>";
while ($row = $res->fetch_assoc()) {
    echo "<ul data-role='listview'><li><a href='{$row['url']}' target='blank'><img src={$row['description']} /><h3>{$row['name']}</h3><p>Blue Prada Spring/Summer2014<p><h4>&#8364;{$row['price']}</h4>
    <a rel='external' href='edittrends.php?pass=hello&action=delete&id={$row['id']}' data-role='button' data-icon='delete'>Delete</a><a rel='external' href='edittrends.php?pass=hello&action=edit&id={$row['id']}'data-role='button' data-icon='plus'>Edit</a></a></li>";
  
	//echo "<td><input type=button value='delete' onClick='deleteStock({$row['id']});'> </td>";
	//echo "<a rel='external' href='edittrends.php?pass=hello&action=delete&id={$row['id']}' data-role='button' data-icon='delete'>Delete</a></td>";
	//echo "<td><a rel='external' href='edittrends.php?pass=hello&action=edit&id={$row['id']}'data-role='button' data-icon='plus'>Edit</a></td>";
	//echo "<td><input type=button value='update' onClick='updateStock({$row['id']});'> </td></tr>";
    
}
//echo "</table>";
	echo "<a rel='external' href='addNewtrend.php' data-role='button' data-icon='plus'>Add</a>";



/* close connection */

mysqli_close($link);




}

?>

<!--Footer ----------------------------------->
  	<div data-role="footer" data-position ="fixed">
    	<h1>Contact us</h1>
    	<a href="https://www.facebook.com/siobhan.collins.777" data-role="button" data-icon="plus""prefetchThisPage.html" data-prefetch>Add Me On Facebook</a>
    	<a href ="page2.php" rel="external" data-role="button" data-icon="minus">Log out</a>

  	</div>
<!-- end content --> 

</div> 

<!-- end page --> 
</div>
</body>
</html>


