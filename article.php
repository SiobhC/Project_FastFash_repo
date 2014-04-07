//article.php will display the final posting for the feed, this queries the selected article with YQL
//this page is loaded from site.php and the site and link are passed through in the querystring, the 
post the user has clicked on is now matched to the YQL query

<?php
 
$siteName = $_GET['siteName'];
$origLink = $_GET['origLink'];
 
// YQL query (SELECT * from feed ... ) // Split for readability
$path = "http://query.yahooapis.com/v1/public/yql?q=";
$path .= urlencode("SELECT * FROM feed WHERE url='http://feeds.feedburner.com/$siteName' AND guid='$origLink'");
$path .= "&format=json";
 
$feed = json_decode(file_get_contents($path));
$feed = $feed->query->results->item;
 
include('views/article.tmpl.php');