<?php
if(isset($_SERVER['HTTPS'])) {
    if ($_SERVER['HTTPS'] == "on") {
        date_default_timezone_set('Europe/Stockholm');
        setcookie("secure_name", "kakan", time()+10800, "/","", TRUE, TRUE);
        setcookie("secure_time", date("D, d M Y H:i:s"), time()+10800, "/", "",  TRUE, TRUE);
        echo "Cookies satt!";
    }
}else{
    echo "ingen https";
}
   
echo "<br/><a href='exempel.php'>Se kakans information här</a>";