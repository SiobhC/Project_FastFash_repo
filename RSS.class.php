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

<body>
<!--Trends ----------------------------------->


<div data-role="page" id="Trends">
  	<div data-role="header" data-position ="fixed">
  		<a rel="external" href="FastFash.php" data-icon="home" data-iconpos="left" data-direction="reverse" class="ui-btn-left" data-transition = "flip">Home</a>
  		<a href ="page2.php" rel="external" data-role="button" data-icon="minus">Log out</a>
  		<h1>Trending Items!</h1>
  	</div>
  	
  	
<!--Navigation bar ----------------------------------->
  	 <div data-role="navbar">
      <ul>
    	<li><a rel="external" href="FastFash.php#Outfit">Outfit of the Day</a>
        <li><a rel="external" href="Closet.php?pass=hello">Closet Profile</a></li>
      </ul>
    </div>
  	
<!--Navigation bar -----------------------------------> 	
<div data-role="main" class="ui-content">

	
  	<?php
	//RSS (Really Simple Syndication), XML plain formatted text displaying regularly changing web content to user.
	//RSS feed to show people important posts from revelent sites that contain trending items
	//Creates a new DOMDocument() which is loaded into the sites feed i.e. WordPress.orgRSS feed
	$rss = new DOMDocument();
	
	//This feed is chanageable to display the revelent sites posts
	$rss->load('http://rss.instyle.com/web/instyle/rss/parties/thisjustin/index.xml');
	$feed = array();
	foreach ($rss->getElementsByTagName('item') as $node) {
	
	//Get id, title,description,link, date and place them into array
		$item = array ( 
			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
			//'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
			);
	//array_push() treats array as a stack, and pushes the passed variables onto the end of array. 		
		array_push($feed, $item);
	}
	//Display 5 posts, with titles linking to original post
	$limit = 5;
	//If the feed is empty return this error message
	if ($feed == null) echo "does not compute";
	else
	//Retrieve the itmes from the array.
	for($x=0;$x<$limit;$x++) {
		$title = str_replace("&", "&amp;", $feed[$x]["title"]);
		$link = $feed[$x]["link"];
		$description = $feed[$x]['desc'];
		//$date = date('l F d, Y', strtotime($feed[$x]['date']));
		//echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
		echo '<small><em>Posted on '.$date.'</em></small></p>';
		echo '<a href="'.$link.'" title="'.$title.'" rel="nofollow">'.$title.'</a>';
		echo '<p>'.$description.'</p>';
		
	}
	
?>


	
<!--Footer ----------------------------------->
  	<div data-role="footer" data-position ="fixed">
    	<h1>Contact us</h1>
    	<a href="https://www.facebook.com/siobhan.collins.777" data-role="button" data-icon="plus""prefetchThisPage.html" data-prefetch>Add Me On Facebook</a>
  	</div>

<!-- end content --> 

</div> 

<!-- end page --> 
</div>

</body>
</html>


