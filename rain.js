<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="FeedEk.js"></script>


<div id="divRss"></div>


$('#divRss').FeedEk({
  FeedUrl : 'http://rss.cnn.com/rss/edition.rss',
  MaxCount : 5,
  ShowDesc : true,
  ShowPubDate:true,
  DescCharacterLimit:100,
  TitleLinkTarget:'_blank',
  DateFormat: 'MM/DD/YYYY',
  DateFormatLang:'en'
});