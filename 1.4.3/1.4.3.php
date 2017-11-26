<?php

  header('Content-type: multipart/x-mixed-replace;boundary=endofsection');
  print "\n--endofsection\n";

      //PLAIN TEXT
      print "Content-type: text/plain\n\n";
      print "Plain text";
      print "--endofsection\n";
      ob_flush();
      flush();
	  sleep(5);
	  //HTML
	  print "Content-type: text/html\n\n";
      print "<strong>HTML text med strong</strong>\n";
	  print "--endofsection--\n";
	  ob_flush();
      flush();
	  sleep(5);
	  //bilden
	  print "Content-type: image/png\n\n";
      $imagepath = "bild.gif";
      $image = imagecreatefromgif($imagepath);     
      imagejpeg($image); 
	  print "--endofsection--\n";
?>