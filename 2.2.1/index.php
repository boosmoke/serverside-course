
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
	    <h1>Form med POST</h1>
		<form method="post" action="exempel.php">
			<p><input name="text_box" value="ABC" type="text"></p>
			<p><textarea name="text_area" rows="10" cols="10">DEF</textarea></p>
			<p><input name="check_box1" value="ON" checked="checked" type="checkbox"></p>
			<p><input name="check_box2" value="OFF" type="checkbox"></p>
			<p>
				<select name="drop_down_menu" size="1">
          			<option value="Value1">Value 1</option>
          			<option value="Value2">Value 2</option>
       		 	</select>
			</p>
			<p><input value="Skicka" name="Skicka_knapp" type="submit"></p>
		</form>
        <h1>FORM med GET</h1>
        <form method="get" action="exempel.php">
			<p><input name="text_box" value="ABC" type="text"></p>
			<p><textarea name="text_area" rows="10" cols="10">DEF</textarea></p>
			<p><input name="check_box1" value="ON" checked="checked" type="checkbox"></p>
			<p><input name="check_box2" value="OFF" type="checkbox"></p>
			<p>
				<select name="drop_down_menu" size="1">
          			<option value="Value1">Value 1</option>
          			<option value="Value2">Value 2</option>
       		 	</select>
			</p>
			<p><input value="Skicka" name="Skicka_knapp" type="submit"></p>
		</form>
	</div><!-- /container -->
</body>

</html>