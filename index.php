//File seems to work march 10th 9.22
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
	//NB you may have to change the location of this stylesheet to MAMP/test/jquery-mobile-.....

					
    
    <script type="text/javascript" src="/path/to/jquery.js"></script>
	<script type="text/javascript" src="/Applications/MAMP/htdoc/test/jquery.jcarousel.js"></script>
	
	
</head>

<body>
      <form action="image2.php" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >

                <label>File:  
                <input name="filename" type="file" id="fileImage" size="30" />
                </label>

                <input type="submit" name="submitBtn" class="sbtn" value="Upload" />


                  <iframeid="upload_target"name="upload_target"src="#"style="width:0;height:0;border:0px solid #fff;"></iframe>
                </form>
                </div>
</body>
</html>