<?php
//$conn = mysqli_connect('localhost', 'root', '', 'commentsection') or die("Can't connect to databse: ". mysqli_connect_error());
$conn = new mysqli('localhost', 'root', '', 'commentsection') or die("Can't connect to databse: ". mysqli_connect_error());