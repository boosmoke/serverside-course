<?php 
   header("Content-type: multipart/x-mixed-replace; boundary=foo"); 
   echo "\n--foo\n"; 
   date_default_timezone_set('Europe/Stockholm');
   
   $count = 10;
   while ($count > 0) 
   {     
       $count--;
       finalCountdown($count);
       sleep(1);
   } 
   echo "--foo--\n";    
   function finalCountdown($count) 
   {
       echo "Content-type: text/plain\n\n"; 
       echo "Aktuell tid: " . date("H:i:s") . "\n";
       echo "Final Countdown: $count";  
       echo "--foo\n"; 
       ob_flush(); 
       flush(); 
   }