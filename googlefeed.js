<!DOCTYPE html>
<head>
<!-- include Google Feed API --> 
<script type="text/javascript" src="http://www.google.com/jsapi?key=[your API key]"></script> 
 
<!-- include this plugin --> 
<script type="text/javascript" src="jquery.gfeed.js"></script> 
 
<script type="text/javascript"> 
    // when the DOM is ready, convert the feed anchors into feed content 
    $(document).ready(function() { 
        $('a.feed').gFeed( { target: '#feeds', tabs: true } ); 
    }); 
</script> 
</head>

<body>
<div id="feeds"> 
    <a class="feed" href="http://jquery.com/blog/feed/">jQuery Blog</a> 
    <a class="feed" href="http://www.learningjquery.com/feed/">Learning jQuery</a> 
</div> 

</body>
</html>