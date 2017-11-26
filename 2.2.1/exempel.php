

<?php
header("Content-type:text/plain");
if($_GET){
    foreach ($_GET as $key => $value) {
        echo "$key = $value \n";
    }
}else{
    foreach ($_POST as $key => $value) {
        echo "$key = $value \n";
    }
}
?>
