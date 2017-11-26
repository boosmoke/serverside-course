
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
	
	<form method="get" action="set.php">
		<p>
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" value="John">
		</p>
		<p>
			<label for="email">Email:</label>
			<input type="text" name="email" id="email"value="john@email.com">
		</p>
		<p>
			<input type="submit" name="send" id="send" value="Send">
		</p>
	</form>
	
	</div><!-- /container -->
	
</body>

</html>