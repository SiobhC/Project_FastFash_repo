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
<body class="home">

<!-- end print cookies -->

<!-- Home -->
<div data-role="page" id="home">

  
  <div data-role="content">
  <div id ="branding">
  	<div id="wordmark"> </div>
  	<h2 id="banner"><a href="http://cooltext.com"><img src="http://images.cooltext.com/3662447.png" width="250" height="78" alt="FastFash"/></a>
	<br /></h2>
	

	
<?php

	
 echo $_SESSION['username'];
 echo "pass:";
 echo $_SESSION['pass'];
 echo "id: ";
 echo $_SESSION['id'];
 echo "This is for session variables";
?>

</div> 
  
  <a href="#myPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all"><?php echo 'Hi '.$_SESSION['username'].'! ' ?></a>
  <a href ="page2.php" rel="external" data-role="button" data-icon="minus">Log out</a>
    <div data-role="popup" id="myPopup" class="ui-content">
      <h3><?php echo 'Hi '.$_SESSION['username'].'! ' ?></h3>
      <p><?php echo'Hi '.$_SESSION['username'].' Welcome back to FashFash, keep updating your profile to organise your closet!'?></p>
  	</div>
  	
  	 

  	
    <ul data-role="listview" data-inset="true"data-filter="true">
     	<li><a rel="external" href="trends.php?pass=hello"><i class="icon-doc" data-icon="arrow-r"></i> Trends</a></li>
     	<li><a rel="external" href="Closet.php?pass=hello"><i class="icon-doc" data-icon="arrow-r"></i> Closet Profile</a></li>
      	<li><a href="#Outfit"><i class="icon-phone" data-icon="arrow-r"></i> Outfit of the Day</a></li>
    </ul>
    	
  
  
  <form>
    <label for="textinput-s">Text Input:</label>
    <input type="text" name="textinput-s" id="textinput-s" placeholder="Text input" value="" data-clear-btn="true">
    <label for="select-native-s">Select:</label>
    <select name="select-native-s" id="select-native-s">
        <option value="small">One</option>
        <option value="medium">Two</option>
        <option value="large">Three</option>
    </select>
    <label for="slider-s">Input slider:</label>
    <input type="range" name="slider-s" id="slider-s" value="25" min="0" max="100" data-highlight="true">
</form>


<div data-role="footer" data-position ="fixed">
    	<a href="https://www.facebook.com/siobhan.collins.777" data-role="button" data-icon="plus">Add Me On Facebook</a>
</div>
  
  
 </div> 
  <!-- end content --> 

</div>
<!-- end page --> 






<!--Trends ----------------------------------->


<div data-role="page" id="Trends">
  	<div data-role="header" data-position ="fixed">
  		<a href="#home" data-icon="home" data-iconpos="left" data-direction="reverse" class="ui-btn-left"
  		data-transition = "flip">Home</a>
  		<a href="#" class="ui-btn ui-icon-search ui-btn-icon-left ui-corner-all ui-shadow" data-transition = "flip">Search</a>
  		
    	<h1>Welcome To My Trends Page</h1>
  	</div>
  	
  	
  	<!--Navigation bar ----------------------------------->
  	 <div data-role="navbar">
      <ul>
        <li><a href="#Outfit">Outfit of the Day</a></li>
        <li><a href="#Closet">Closet Profile</a></li>
      </ul>
    </div>
  	
  	
  	<!--Popup ----------------------------------->
<div data-role="main" class="ui-content">
    <a href="#myPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all">Hi there!</a>

<div data-role="popup" id="myPopup" class="ui-content">
      <h3>Welcome to Trends page!</h3>
      <p>This page shows all the trends from the Spring/Summer 2014 collection</p>
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
	
		<img id ="prada" src="prada.jpg" width="150" height="150" />
		<img id ="kurt_geiger" src="kurt_geiger.jpg" width="150" height="150" />
		<img id ="hunter" src="hunter.jpg" width="150" height="150" />
		
		<div id="result1">Left Image:</div>
		<div id="result2">MiddleIMage:</div>
		<div id="result3">Right Image:</div>
	
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



<!--Outfit of the Day --------------------------------- -->

<div data-role="page" id="Outfit">
  <div data-role="header" data-position ="fixed">
  	<a href="#home" data-icon="home" data-iconpos="left" data-direction="reverse" class="ui-btn-left" data-transition = "flip">Home</a>
  	<a href="#" class="ui-btn ui-icon-search ui-shadow ui-btn-icon-left ui-corner-all">Search</a>
    <h1>Outfit of the Day!</h1>
  </div>
  
<!--Navigation bar ----------------------------------->
  	 <div data-role="navbar" data-theme="e">
      <ul>
        <li><a rel="external" href="trends.php?pass=hello">Trends</a></li>
        <li><a rel="external" href="Closet.php?pass=hello">Closet Profile</a></li>
      </ul>
    </div>
    


  <!--Ouftit of the Day Content----------------------------------->
	
 	<a href="#" class="ui-btn ui-corner-all ui-icon-camera ui-btn-icon-left">Camera Icon</a>
 	<div data-role="content"  data-position ="fixed">
    	<p>This is page three and should contain all the information about outfit of the day</p>
    	<p class="show-menu">Show/Hide Menu<p>
    
    

    
    <label for="select-choice-1" class="select">Choose a Trending Item!:
    </label>
    		<select name="select-choice-1" id="select-choice-1">
    			<option value="item1">Michelle Phan: Colour Explosion Party Makeup!</option>
    			<option value="item2">Second Menu Item</option>
    			<option value="item3">Third Menu Item</option>
    		</select>	
	 <!--youtube content----------------------------------->
    <div id="popupVideo" data-overlay-theme="a" data-theme="d" data-tolerance="15,15" class="ui-content">
		<iframe src="http://www.youtube.com/embed/?v=QtKc_ZSGPOQ&list=UUuYx81nzzz4OFQrhbKDzTng" width="497" height="298" seamless></iframe>
	</div>	
		
		
	<div id="popupVideo" data-overlay-theme="a" data-theme="d" data-tolerance="15,15" class="ui-content">
		<iframe src="http://www.youtube.com/embed/?v=ZlKBV9JDxVQ&list=PLgV4ByaKNobEEmtRKiQ7mLMwJLq_yjasc"  width="497" height="298" seamless></iframe>
	</div>	
			
	
	<div id="popupVideo" data-overlay-theme="a" data-theme="d" data-tolerance="15,15" class="ui-content">
		<iframe src="http://www.youtube.com/embed/?v=AyQuvC1q_BE&index=2&list=PLDjQNigLonUypvb135TBi--bEMxMP5CJ_"  width="497" height="298" seamless></iframe>
	</div>	

	<!--end youtube content----------------------------------->	
 
   <ul data-role="listview" data-filter="true" data-filter-placeholder="Search outfits..." data-inset="true" data-theme="e">
    	<li><a href="#">Chanel</a></li>
    	<li><a href="#">Dolce&Gabanna</a></li>
    	<li><a href="#">Kurt Geiger</a></li>
    	<li><a href="#">Max Mara</a></li>
    	<li><a href="#">Prada</a></li>
	</ul>   

	
	
<!--Gallery-->	
<div id="Gallery">
		<div class="gallery-row">
		<div class="gallery-item"><a href="prada.jpg"><img src="prada.jpg" alt="Image 01" /></a></div>
		<div class="gallery-item"><a href="kurt_geiger.jpg"><img src="kurt_geiger.jpg" alt="Image 02" /></a></div>
		<div class="gallery-item"><a href="hunter.jpg"><img src="hunter.jpg" alt="Image 03" /></a></div>
	</div>
	
	<div class="gallery-row">
		<div class="gallery-item"><a href="images/full/04.jpg"><img src="images/thumb/04.jpg" alt="Image 04" /></a></div>
		<div class="gallery-item"><a href="images/full/05.jpg"><img src="images/thumb/05.jpg" alt="Image 05" /></a></div>
		<div class="gallery-item"><a href="images/full/06.jpg"><img src="images/thumb/06.jpg" alt="Image 06" /></a></div>
	</div>
</div>	

<!--Gallery-->	

<div class ="ui-grid-a" id="Outfit">
	<div class="ui-block-a">
		<h1> Outfit of the Day</h1>
		<p><strong>  Restaurant bar in the center of Strasbourg</strong></p>
		<p> On the menu: </p>
			<ul>
				<li> Milkshake with chocolat</li>
				<li> Planchettes </li>
				<li> Leek pie </li>
			</ul>
	</div>
	<div class="ui-block-b">
		<p><img src="prada.jpg" alt="prada shoes"/></p>
		<p><a href="http://www.google.ie" rel="external" data-role="button"> See our website</a></p>
	</div>
<!--End div grid a-->
</div>	
<hr />
 
 <!-- Locations & links to stores -->
 <div class="ui-grid-a" id="Outfit">
		<div class="ui-block-a">
			<h2> Contact us</h2>
			<p>National University of Ireland</p>
			<p>Galway	</p>
		</div>
		<div class="ui-block-b">
			<img src="01_maps.jpg" alt="plan jeanette"/>
		</div>
<!--End div grid a-->
</div>



		<div id="contact_buttons">
			<a href="https://maps.google.ie/maps?ie=UTF-8&q=nui+galway&fb=1&gl=ie&hq=national+university+of+ireland+galway&cid=10034547999759139440&ei=QaUVU9fzOaiS7Qbd3ICYDg&ved=0CJ4BEPwS" data-role="button" data-icon="maps"> Find us on Google Maps </a>
			<!--<a href="tel: "  data-role="button" data-icon="tel"> Call us </a>-->
		</div>
	<hr/>
 
	<div id="notation">
	<form>
	<label for="select-choice-0" class="select"><h2> User rating </h2></label>
		<select name="note_utilisateur" id="note_utilisateur" data-native-menu="false" data-theme="c" >
		   <option value="one" class="one"> Not good at all </option>
		   <option value="two" class="two">Average </option>
		   <option value="three" class="three">Pretty good </option>
		   <option value="four" class="four"> Excellent </option>
		</select>
	</form>
	</div>
	
	
  <!--Footer ----------------------------------->
  <div data-role="footer" data-position ="fixed">
  	<a href="https://www.facebook.com/siobhan.collins.777" data-role="button" data-icon="plus">Facebook</a>
    <a href ="page2.php" rel="external" data-role="button" data-icon="minus">Log out</a>
  </div>

  <!--Submit form----------------------------------->
<fieldset class="ui-grid-a">
    <div class="ui-block-a"><button type="submit" data-theme="c">Cancel</button></div>
    <div class="ui-block-b"><button type="submit" data-theme="b">Submit</button></div>
</fieldset>
<!-- end content --> 

</div> 
<!-- end page --> 

</div>



<!--Closet Profile --------------------------------- -->

<div data-role="page" id="Closet">
  <div data-role="header" data-position ="fixed">
  <a href="#home" data-icon="home" data-iconpos="left" data-direction="reverse" class="ui-btn-left"
  		data-transition = "flip">Home</a>
  <a href="#" class="ui-btn ui-btn-icon-left ui-icon-search ui-corner-all ui-shadow">Search</a>
    <h1>Welcome to your Closet Profile!</h1>
  </div>
  
    <!--Navigation Bar ----------------------------------->
    <div data-role="navbar">
    	<ul>
    		<li><a href="#Trends">Trends</a>
    		<li><a href="#Outfit">Outfit of the Day</a>
    	</ul>
    </div>
    
    <!--Closet profile content -----------------------------------> 
  <div data-role="content" >
  <div data-role="collapsible">
      <h1>Shoes!</h1>
      	<p>
      This is page four and should contain all the clothes owned by the user</p>
      		<div data-role="collapsible">
      		<h4>Heels</h4>
    			<ul data-role="listview" data-filter="true" data-filter-placeholder="Search closet..." data-inset="true">
    				<li><a href="#">Green</a></li>
    				<li><a href="#">Black</a></li>
    				
				</ul>   	
	
      		</div>
    	<div data-role="collapsible">
      		<h1>Pumps</h1>
      	 	
      		<p>This should contain a image and description of users pumps </p>
      	</div>
   </div>
   

   
    <ul data-role="listview" data-filter="true" data-filter-placeholder="Search closet..." data-inset="true">
    <li><a href="#">Shoes</a></li>
    <li><a href="#">Tops</a></li>
    <li><a href="#">Jeans</a></li>
    <li><a href="#">Accessories</a></li>
    <li><a href="#">Dresses</a></li>
    <li><a href="#">Coats/Jackets</a></li>
	</ul>   	
	
  	
<!-- Allow user to input items into profile --> 

<div data-role="controlgroup" data-type="horizontal" data-mini="true">
    <a href="#" data-role="button" data-icon="plus" data-theme="b">Add</a>
    <a href="#" data-role="button" data-icon="delete" data-theme="b">Delete</a>
    <a href="#" data-role="button" data-icon="grid" data-theme="b">More</a>
</div>

 <!--Footer -----------------------------------> 
  <div data-role="footer" data-position ="fixed">
   <a href="https://www.facebook.com/siobhan.collins.777" data-role="button" data-icon="plus">Add Me On Facebook</a>
   <a href ="page2.php" rel="external" data-role="button" data-icon="minus">Log out</a>
  </div>
  
      
<!-- end content --> 

</div> 


<!-- end page --> 
</div>

<!-- --------------------------------- -->

<script>

//Handler for sliding menu event
	$("Outfit").live('pageinit', (function(event) {
		$(".show-menu").click(function() {
			$(".sliding-menu").toggleClass("reverse out in");
			})
			}))
			
//jcarousel image gallery	
$('.jcarousel').jcarousel('scroll', '+=2');		
$(function() {
    $('.jcarousel').jcarousel({
         items: '.jcarousel-item'
    });
});		
function() {
    return this.list().children();
}	
			
//Binding to a tap event
	$("body").bind("tap", function() {
		console.log("Tap Event on the body Element");
		return false;
		});
		
	$("body").bind("taphold", function() {
		console.log("Taphold Event on the body Element");
		return false;
		});	
		

//Eevnt handling for taphold and swipe	
	$("Trends").live('pageinit', (function(event) {
	//Handler for taphold
		$("#prada").bind("taphold", function(event, ui) {
		console.log("Left Image: Taphold Event");
		$("#result1").html("Left image tap hold event");
		})
		
		
	//Handler for swipe left event	
		$("#kurt-geiger").bind("swipe-left", function(event, ui) {
		console.log("Middle Image: Swipe Left Event");
		$("#result2").html("Middle Image: Swipe Left Event");
		})
		
	//Handler for swipe right event	
		$("#hunter").bind("swipe-right", function(event, ui) {
		console.log("Right Image: Swipe Right Event");
		$("#result3").html("Right Image: Swipe Right Event");
);	
	//jQuery version
$(document).ready(function(){
	$("#Gallery a").photoSwipe();
});

$( '#Trends' ).live( 'pageinit',function(event){
var SelectedOptionClass = $('option:selected').attr('class');
$('div.ui-select').addClass(SelectedOptionClass);
$('#note_utilisateur').live('change', function(){
  $('div.ui-select').removeClass(SelectedOptionClass);
  SelectedOptionClass = $('option:selected').attr('class');
$('div.ui-select').addClass(SelectedOptionClass);
});

</script>
			


</body>
</html>