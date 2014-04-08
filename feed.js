<!DOCTYPE html>
<html>
<head>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="jquery.zrssfeed.min.js" type="text/javascript"></script>

</head>

<body>

<script type="text/javascript" LANGUAGE="javascript">
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
<div id="ticker1" class="rssFeed">

  <div class="rssHeader"><
    <a>... (heading) ...</a>
  </div>
  <div class="rssBody"></div>
    <ul>
      <li class="rssRow odd">
        <h4><a>... (title) ...</a></h4>
        <div>... (date) ...</div>
        <p>... (description) ...</p>
        <div class="rssMedia">
          <div>Media files</div>
          <ul>
            <li><a>... (media link) ...</a></li>
          </ul>
        </div>
      </li>
      <li class="rssRow even">...</li>
      ...
    </ul>
  </div>
</div>

<div id="ticker1" class="rssFeed">
  <div class="rssError">
    <p>... (error message) ...</p>
  </div>
 
  </body>
  </html>
</div>
