<?php
$name = $_GET["name"];
$name = preg_replace('/\s+/', '+', $name);
$html = file_get_contents("index2.html");
$html = str_replace('---$hits---', $name, $html);
echo $html;
?>