

<?php
$html = file_get_contents("htmlsidan.php");
$nummer =  file_get_contents('besok2.txt');
$filen = fopen('besok2.txt', 'w');
        //lås filen
    if (flock($filen,LOCK_EX)){
        //plussa 1 till besok
        fwrite($filen, $nummer+1);
         // lås upp
        flock($filen,LOCK_UN);
  }else{
        echo "Gick inte att låsa filen!";
  }
fclose($filen);
$html = str_replace('---$hits---', $nummer, $html);
echo $html;
?>
