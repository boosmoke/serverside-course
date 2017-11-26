<?php
session_start();
header("Refresh:10; url=kontakt.html");
?>
<!doctype html>
<html lang="en">
<head>
  <!-- HEADER INFORMATION -->
  <meta charset="utf-8">
  <title>Kameleo</title>
  <meta name="description" content="Kameleo Webbyrå">
  <meta name="author" content="John Lybeck">
  <link rel="stylesheet" href="styles.css">
</head>
<!-- HEADER INFORMATION ENDS -->
<body>
  <!-- MAIN BEGINS -->
  <div class="container">
    <div class="centered-text contact">
      <h1 style="text-align:center;">Tack för din e-post <?php echo $_SESSION['mail'][0]; session_destroy(); ?></h1>
      <h3 style="text-align:center;">Vi återkommer så fort vi kan. Du kommer bli automatiskt vidarebefodrad tillbaka. Om detta inte händer klicka <strong><a href="kontakt.html" style="text-decoration:none">här</a></strong></h3>
    </div>
  </div>
  <!-- MAIN ENDS -->
  <!-- FOOTER BEGINS -->
  <footer>
    <div class="footer-container">
      <span>
        <h4>ANVÄNDBARA LÄNKAR</h4>
        <ul>
          <li><a href="index.html">Hem</a></li>
          <li><a href="butik.php">Butik</a></li>
          <li><a href="om.html">Om Kameleo</a></li>
          <li><a href="kontakt.html">Kontakt</a></li>
        </ul>
      </span>
      <span>
        <h4>ADRESS</h4>
        <ul>
          <li>Kameleo AB</li>
          <li>Påhittadväg 25</li>
          <li>13412 Stockholm</li>
          <li>Telefon: 01719101</li>
          <li>e-post: kontakt@kameleo.se</li>
        </ul>
      </span>
    </div>
    <span class="copyright">
      Copyright&#169; Kameleo AB 2017
    </span>
  </footer>
  <!-- FOOTER ENDS -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
    <!--<script src="main.js"></script> -->
</body>
</html>
<?php die(); ?>