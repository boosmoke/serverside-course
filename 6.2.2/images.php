<?php
	mysql_connect("localhost", "plugg", "hejsan123") or die(mysql_error());
	mysql_select_db("plugg") or die(mysql_error());
	$query = mysql_query("SELECT * FROM image WHERE id = ".$_GET['id']);
	$row = mysql_fetch_assoc($query);
	header("Content-type: " . $row['mime']);
	echo $row['pic'];
?>