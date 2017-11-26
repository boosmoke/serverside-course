<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "butik") or die("Could not connect.");
$conn->set_charset("utf8");
?>
<!doctype html>
<html lang="en">
<head>
  <!-- HEADER INFORMATION -->
  <meta charset="utf-8">
  <title>Kameleo Butik</title>
  <meta name="description" content="Kameleo Webbyrå">
  <meta name="author" content="John Lybeck">
  <link rel="stylesheet" href="styles.css">
</head>
<!-- HEADER INFORMATION ENDS -->
<body style="background-color:#191919;">
  <!-- ANCHOR LINK TAG -->
  <div id="top"><div id="toTop">&#10095;</div></div>
  <!-- NAV BEGINS -->
  <nav>
    <ul>
      <li><a href="index.html">Hem</a></li>
      <li class="active"><a href="butik.php">Butik</a></li>
      <li><a href="om.html">Om Kameleo</a></li>
      <li><a href="kontakt.html">Kontakt</a></li>
    </ul>
  </nav>
  <!-- NAV ENDS -->
  <!-- HEADER BEGINS -->
  <header id="shop-header">
    <div class="header-container">
      <h1>- BUTIK -</h1>
      <span class="quote">Här hittar du det absolut coolaste tillbehören för din bräda.<br> Lysande LED hjul med alla regnbågens färger!</span>
    </div>
    <style>
    nav ul li.active a {
      font-weight: bold;
      color: #FFF056;
    } 
    </style>
  </header>
  <!-- HEADER ENDS -->
  <!-- MAIN BEGINS -->
  <div class="shop-content">
<?php
 $query = "SELECT * FROM produkter ORDER BY id ASC";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
 ?>
        <div class="produkt-container" id='store-location'>
          <img src="<?php echo "img/".$row["produktbild"]; ?>" class="img-responsive">
          <form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
              <h5 class="text-info"><?php echo $row["namn"]; ?></h5>
              <p class="produkt-beskrivning"><?php echo $row["beskrivning"]; ?></p>
              <h5 class="produkt-pris">SEK <?php echo $row["pris"]; ?></h5>
              <input type="number" name="antal" value="1">
              <input type="hidden" name="hidden_namn" value="<?php echo $row["namn"]; ?>">
              <input type="hidden" name="hidden_pris" value="<?php echo $row["pris"]; ?>">
              <input type="submit" name="add" value="Lägg till">
          </form>
        </div>
<?php
    }
 }
 ?>
  </div>
  <div class="kundvagn">
    <h2>Kundvagn</h2>
      <table id="kassa">
      <tr>
        <th>Produkt</th>
        <th>Antal</th>
        <th>Pris</th>
        <th>Totalt</th>
        <th>Redigera Order</th>
      </tr>
      <?php
        if(!empty($_SESSION["cart"])){
          $total = 0;
          foreach($_SESSION["cart"] as $keys => $values){
      ?>
      <tr>
        <td><?php echo $values["varans_namn"]; ?></td>
        <td><?php echo $values["varans_antal"] ?></td>
        <td>SEK <?php echo $values["produkt_pris"]; ?></td>
        <td>SEK <?php echo number_format($values["varans_antal"] * $values["produkt_pris"], 2); ?></td>
        <td><a href="shop.php?action=delete&id=<?php echo $values["produkt_id"]; ?>" class="remove-item"><span title="ta bort från kundvagn">&cross;</span></a></td>
      </tr>
      <?php 
          $total = $total + ($values["varans_antal"] * $values["produkt_pris"]);
          }
      ?>
      <tr class="total-summa">
        <td colspan="5" align="right">Total: SEK <?php echo number_format($total, 2); ?></td>
        
      </tr>
      <?php
        }
      ?>
      </table>
      <form action="shop.php?action=till-kassan" method="post">
        <!-- disabled knapp om produkt inte finns i kassan -->
        <input type="submit" value="Till Kassan" name="till-kassan" <?php if (empty($_SESSION["cart"])){ ?> disabled <?php   } ?> />
      </form>
    </div>
  <!-- MAIN ENDS -->
  <!-- FOOTER BEGINS -->
  <footer>
    <div class="footer-container">
      <div>
        <h4>ANVÄNDBARA LÄNKAR</h4>
        <ul>
          <li><a href="index.html">Hem</a></li>
          <li><a href="butik.php">Butik</a></li>
          <li><a href="om.html">Om Kameleo</a></li>
          <li><a href="kontakt.html">Kontakt</a></li>
        </ul>
      </div>
      <div>
        <h4>ADRESS</h4>
        <ul>
          <li>Kameleo AB</li>
          <li>Påhittadväg 25</li>
          <li>13412 Stockholm</li>
          <li>Telefon: 01719101</li>
          <li>e-post: kontakt@kameleo.se</li>
        </ul>
      </div>
    </div>
    <span class="copyright">
      Copyright&#169; Kameleo AB 2017
    </span>
  </footer>
  <!-- FOOTER ENDS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>