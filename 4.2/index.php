<?php
header("content-type: text/html");
    if(!isset($_COOKIE['cookie'])){
        setcookie('mincookie', 'Kakmonster', time()+10800);
        setcookie("mincookietid", date("l jS \of F Y h:i:s A"), time()+10800);
        echo "<strong>Kakan</strong> går ut om 3 timmar! </br>";
    }else{
        echo "en kaka finns redan</br>";
    }
    echo "<a href='./exempel2.php'>Klicka här för information om kakan</a>";
?>