
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Webbutveckling-Serversidan</title>                  
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
</head>

<body>
	
	<!-- container -->
	<div class="container">
	
	<form action="exempel.php" method="post" enctype="multipart/form-data">
		<fieldset><legend> Ladda upp fil</legend>
			<p><input type="file" name="file" size="35" id="upload_file"></p>
			<p><input type="submit" value="Skicka" name="submit"></p>
		</fieldset>
	</form>
	</div><!-- /container -->
	
</body>

</html>