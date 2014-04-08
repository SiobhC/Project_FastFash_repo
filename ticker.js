<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="en" />

<link href="example_ticker.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="jquery.zrssfeed.min.js" type="text/javascript"></script>
<script src="jquery.vticker.js" type="text/javascript"></script>

<title>zRSSFeed - RSS feed with images and ticker animation</title>

<script type="text/javascript">
$(document).ready(function () {
	$('#ticker1').rssfeed('http://feeds.bbc.co.uk/iplayer/highlights/tv/list',{
		snippet: false
	}, function(e) {
		$(e).find('div.rssBody').vTicker({
			showItems: 1
		});
	});
});
</script>

</head>
<body>

<h1>zRSSFeed - RSS feed with images and ticker animation</h1>
<p>This example shows scrolling feed which includes images using the vTicker plugin.</p>

<h4>Script</h4>
<pre>
$(document).ready(function () {
	$('#ticker1').rssfeed('http://feeds.bbc.co.uk/iplayer/highlights/tv/list',{
		snippet: false
	}, function(e) {
		$(e).find('div.rssBody').vTicker({
			showItems: 1
		});
	});
});
</pre>

<h4>Result</h4>
<div id="ticker1"></div>

</body>
</html>