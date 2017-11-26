 <?php
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

echo $nummer;

?>

