<?php include('site.php'); ?>
<body> 
 
<div data-role="page">
 
   <header data-role="header" class="<?php echo $siteName; ?>">
      <h1> <?php echo ucWords($siteName).'+'; ?> </h1>
   </header>
 
 <!-- Only one posting for the YQL query to display -->
   <div data-role="content">  
        <h1> <?php echo $feed->title; ?> </h1>
        <div> <?php echo $feed->description; ?> </div>
   </div>
 
 <!--Apply a footer to link back to the original article NETtuts -->
   <footer data-role="footer" data-position="fixed">
   <h4> <a href="<?php echo $feed->guid->content;?>"> Read on <?php echo ucWords($siteName); ?>+</a></h4>
</footer>
</div>
 
</body>
</html>