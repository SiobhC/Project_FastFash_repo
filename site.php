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
	<script type="text/javascript" src="/Applications/MAMP/htdoc/test/jquery.jcarousel.js"></script>
	
	
	
	
	
	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->
	
</head>

<body>
  <div>
        <header data-role="header" class="tuts">
            <h1> <img src="img/TLogo.png" alt="Tuts+"/> </h1>
        </header>
     
        <div data-role="content" data-transition="pop">
            <ul data-role="listview"  data-dividertheme="e">
                <li>
                    <img src="img/ntLogo.jpg" alt="Nettuts" class="ui-li-icon"/>
                    <a href="site.php?siteName=nettuts" data-transition="pop"> Nettuts+ </a>
                </li>
                <li>
                    <img src="img/psdLogo.jpg" alt="Psdtuts" class="ui-li-icon"/>
                    <a href="site.php?siteName=psdtuts" data-transition="pop"> Psdtuts+ </a>
                </li>
                <li>
                    <img src="img/vectorLogo.jpg" alt="Vectortuts+" class="ui-li-icon"/>
                    <a href="site.php?siteName=vectortuts" data-transition="pop"> Vectortuts+ </a>
                </li>
                
                <li data-role="list-divider" >
                <h2>Break</h2>
                </li>
                
                <li>
                    <img src="img/mobileLogo.png" alt="Mobiletuts+" class="ui-li-icon"/>
                    <a href="site.php?siteName=mobiletuts" data-transition="pop"> Mobiletuts+ </a>
                </li>
                <li>
                    <img src="img/aeLogo.jpg" alt="Aetuts+" class="ui-li-icon"/>
                    <a href="site.php?siteName=aetuts" data-transition="pop"> Aetuts+ </a>
                </li>
                <li>
                    <img src="img/photoLogo.jpg" alt="Phototuts+" class="ui-li-icon"/>
                    <a href="site.php?siteName=phototuts" data-transition="pop"> Phototuts+ </a>
                </li>
                <li>
                    <img src="img/cgLogo.jpg" alt="Cgtuts+" class="ui-li-icon"/>
                    <a href="site.php?siteName=cgtuts" data-transition="pop"> Cgtuts+ </a>
                </li>
                
                <li data-role="list-divider">
                <h2>Break</h2>
                </li>
                
                <li>
                    <img src="img/audioLogo.jpg" alt="Audiotuts+" class="ui-li-icon"/>
                    <a href="site.php?siteName=audiotuts" data-transition="pop"> Audiotuts+ </a>
                </li>
                <li>
                    <img src="img/wdLogo.jpg" alt="Webdesigntuts+" class="ui-li-icon"/>
                    <a href="site.php?siteName=webdesigntutsplus" data-transition="pop"> Webdesigntuts+ </a>
                </li>
            </ul>
        </div>
     
        <footer data-role="footer" class="tuts">
            <h4> www.tutsplus.com </h4>
        </footer>
 
    </div>
 
  
</body>
</html>
<?php
$siteName = empty($_GET['siteName']) ? 'nettuts' : $_GET['siteName'];

// Prepare array of tutorial sites
$siteList = array(
   'nettuts',
   'flashtuts',
   'webdesigntutsplus',
   'psdtuts',
   'vectortuts',
   'phototuts',
   'mobiletuts',
   'cgtuts',
   'audiotuts',
   'aetuts'
);
 
// If the string isn't a site name, just change to nettuts instead.
if ( !in_array($siteName, $siteList) ) {
   $siteName = 'nettuts';
}

//cache is variable equal to site where file will b stored
$cache = dirname(__FILE__) . "/cache/$siteName";


//Refresh cache every 3 hours
$cache = dirname(__FILE__) . "/cache/$siteName";

	// Re-cache every three hours
	if( filemtime($cache) < (time() - 10800) ) {
	// grab the site's RSS feed, via YQL
	


	// YQL query (SELECT * from feed ... ) // Split for readability
	//Grab the name of the site from the querystring
	//Inset it into the select statement
	$path = "http://query.yahooapis.com/v1/public/yql?q=";
	$path .= urlencode("SELECT * FROM feed WHERE url='http://feeds.feedburner.com/$siteName'");
	$path .= "&format=json";

	//Use file_get_contents to grab the feed
	//$feed is now equal to the returned JSON, store the results in a textfile
	$feed = file_get_contents($path, true);
	echo "$feed ";
	// If something was returned, cache
	//Open cached file, write data to  file and close file
	if ( is_object($feed) && $feed->query->count ) {
   	$cachefile = fopen($cache, 'w');
   	fwrite($cachefile, $feed);
   	fclose($cachefile);
	}

}

else {
// We already have local cache. Use that instead.
$feed = file_get_contents($cache);
}

//Decode the JSON with php
$feed = json_decode($feed);
// Include the view
include_once('site.tmpl.php');

?>

