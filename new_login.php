<!DOCTYPE html>
<html>
<head>
    <title>jQuery Mobile page</title>
    
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>

	//NB you may have to change the location of this stylesheet to MAMP/test/jquery-mobile-.....

    
    <script type="text/javascript" src="/path/to/jquery.js"></script>
	<script type="text/javascript" src="/Applications/MAMP/htdoc/test/jquery.jcarousel.js"></script>
</head>


<body>
<form method="PUT" action="api/auth" data-ajax="false">
    <label for="login_username">Username:</label><br>
    <input type="text" name="login_username" id="login_username" /><br>
    <label for="login_password">Password:</label><br>
    <input type="password" name="login_password" id="login_password" /><br>
    <button id="login_submit" type="submit" data-theme="a">Submit</button>
</form>

</body>
</html>

$(document).ready(function() {
    $("#login_submit").click(function(event) {
        event.preventDefault();
        var credentials = { type: 'EMAIL', username: $('#login_username').val(), password: $('#login_password').val() };
        $.ajax({
            type: "PUT",
            url: "api/auth",
            cache: false,
            data: JSON.stringify(credentials),
            contentType: "application/json; charset=utf-8",
            success: function(data) {
                //validate the response here, set variables... whatever needed
                    //and if credentials are valid, forward to the next page
                $.mobile.changePage($('#main_menu'));
                    //or show an error message
            },
            error: function() { // server couldn't be reached or other error }
        });
    });
});