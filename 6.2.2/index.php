<?php
    date_default_timezone_set('Europe/Stockholm');
    include 'databas.php';
    include 'comments.php';
?>
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
	    <h1>HTML</h1>
        <?php
       echo "<form method='POST' action='".setKommentarer($conn)."'enctype='multipart/form-data'>
            <table><tbody>
            <input type='hidden' name='uid' value='Anonym'>
            <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
            <tr><td>Namn:</td><td> <input type='text' name='username' value=''></td></tr>
            <tr><td>E-post:</td> <td><input type='text' name='email' value=''></td></tr>
            <tr><td>Hemsida: </td><td><input type='text' name='homepage' value=''></td></tr>
            <tr><td>Bild: </td><td><input type='file' name='image' id='image'></td></tr>
            <tr><td>Kommentar: </td><td><textarea name='message' rows='' cols=''></textarea></td></tr>
            <td><input type='submit' name='submitComment' value='Kommentera'></td>
            <tbody><table>
        </form>";
        echo "<hr>";
        getKommentarer($conn);
        ?>
	</div><!-- /container -->
</body>

</html>