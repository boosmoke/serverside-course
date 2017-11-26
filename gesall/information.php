<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "butik") or die("Could not connect.");
/*
if(!empty($_SESSION["cart"])){
  $total = 0;
  foreach($_SESSION["cart"] as $keys => $values){
    $produkt_namn = $values["varans_namn"]; 
    $produkt_antal = $values["varans_antal"]; 
    $produkt_pris = $values["produkt_pris"]; 
    $produkt_pris_antal = number_format($values["varans_antal"] * $values["produkt_pris"], 2); 
    $total = $total + ($values["varans_antal"] * $values["produkt_pris"]);
  }
  
  
    echo "Total";
    echo "SEK".number_format($total, 2);
 }
 */
 //använd session_destroy(); när kund fått kvitto
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
    <div class="centered-text order-summary">
      <form method="post" action="bekraftelse.php">
        <h1>Slutför beställningen</h1>
        <p class="form-description">Vänligen fyll i dina kontaktuppgifter.</p>
        <p>Förnamn: <span class="required">*</span> <br>
        <input type="text" placeholder="t.ex. Jan"required name="fornamn"></p>
        <p>Efternamn: <span class="required">*</span> <br>
        <input type="text" placeholder="t.ex. Svensson"required name="efternamn"></p>
        <p>Adress: <span class="required">*</span> <br>
        <input type="text" placeholder="t.ex. Påhittadväg 1" required name="adress"></p>
        <p>Postnummer: <span class="required">*</span> <br>
        <input type="text" placeholder="t.ex. 11111" required name="postnummer"></p>
        <p>Ort: <span class="required">*</span> <br>
        <input type="text" placeholder="t.ex. Stockholm" required name="ort"></p>
        <p>E-post: <span class="required">*</span> <br>
        <input type="email" placeholder="t.ex. namn@epost.se" required name="epost"></p>
        <p>Telefon: <br>
        <input type="text" placeholder="t.ex. 123 1111 123" name="telefon"></p>
        <input type="submit" value="Slutför beställningen" class="submitMsg" name="place-order">
        <h2>Din Order:</h2>
        <p class="form-description">Nedan kan du se en summering av din order:</p>
<!-- VISA KUNDVAGN -->
        <table class="summary-table">
          <tr>
            <th width="40%">Produkt</th>
            <th width="10%">Antal</th>
            <th width="20%">Pris</th>
            <th width="20%">Totalt produkt</th>
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
            <td><a href="shop.php?action=delete_info&id=<?php echo $values["produkt_id"]; ?>" class="remove-item"><span title="ta bort från kundvagn">&cross;</span></a></td>
          </tr>
<?php 
          $total = $total + ($values["varans_antal"] * $values["produkt_pris"]);
          }
?>
          <tr id="total-sum">
            <td><strong>Total order:</strong></td>
            <td></td>
            <td></td>
            <td>SEK <?php echo number_format($total, 2); ?></td>
          </tr>
<?php
      }
?>
        </table>
      </form>
<!-- VISA KUNDVAGN -->
    </div>
  </div>
  <!-- MAIN ENDS -->
</body>
</html>