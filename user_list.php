//user list for profile


<?php

include('init.inc.php');
echo 'test';

?>

<html>
<head>
    <title>jQuery Mobile page</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


	 <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.1/jquery.mobile-1.4.1.min.css" />

		 
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.1/jquery.mobile-1.4.1.min.js"></script>
	
	<script type="text/javascript" src="/Users/admin/Documents/1.0.11/simple-inheritance.min.js">
	<script type="text/javascript" src="/Users/admin/Documents/1.0.11/code-photoswipe-1.0.9.min.js">
	//NB you may have to change the location of this stylesheet to MAMP/test/jquery-mobile-.....

					
    
    <script type="text/javascript" src="/path/to/jquery.js"></script>
	<script type="text/javascript" src="/Applications/MAMP/htdoc/test/jquery.jcarousel.js"></script>
	
	</head>
	
	
	<body>
	
	<div>
	
	
	<?php
	
	foreach(fetch_users() as $user){
		?>
		<p>
			
			$link = "<a href='profile.php?uid=" <?php echo $user['user_id']; ?> "'>" <?php echo $user['user_username']; ?> "</a>";
			echo $link;
		</p>
		
		<?php
	
	
	}
	
	?>
	
	</div>
	
	
	
	</body>
	</html>