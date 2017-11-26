<?php
$type = $_FILES["file"]["type"];
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
	if(!empty($name)){
		if($type == 'image/jpeg'){
			header('Content-Type: image/jpeg');
			echo file_get_contents($_FILES["file"]["tmp_name"]); 
		}else if($type == 'image/png'){
			header('Content-Type: image/png');
			echo file_get_contents($_FILES["file"]["tmp_name"]);
		}else if($type == 'text/plain'){
			header('Content-Type: text/plain');
			echo file_get_contents($_FILES["file"]["tmp_name"]);
		}else{
			header('Content-Type: text/html');
			echo ("name = $name</br>");
			echo ("type = $type</br>");
			echo ("size = $size</br>");
		}
	}else{
		echo "Ingen fil bifogad";
	}
?>