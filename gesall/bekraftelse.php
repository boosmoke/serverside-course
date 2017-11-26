<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "butik") or die("Could not connect.");
date_default_timezone_set("Europe/Stockholm");
$timestamp = date("d/m/Y H:i:s", time());

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
    <div class="centered-text order-bekraftelse">
      <h1>Bekräftelse Kvitto</h1>
         <?php echo "<p><i>Datum: ".$timestamp."</i></p>"; ?>
         <h2>Kontaktuppgifter</h2>
         <?php
          $required = array('fornamn', 'efternamn', 'adress', 'postnummer', 'ort', 'epost');
          $error = false;
          foreach($required as $input) {
            if (empty($_POST[$input])) {
            $error = true;
            }
          }
          if(!$error){
            echo "<p><strong>Namn:</strong></p>"
            ."<p>".$_POST['fornamn']." ".$_POST['efternamn']."</p>"
            ."<p><strong>Leveransadress:</strong> </p>"
            ."<p>".$_POST['adress']."</p>"
            ."<p>".$_POST['postnummer']."</p>"
            ."<p>".$_POST['ort']."</p>"
            ."<p><strong>Kontakt/avisering</strong>"
            ."<p>".$_POST['epost']."</p>";
            if(isset($_POST['telefon'])){echo "<p>".$_POST['telefon']."</p>";}
          }else{
            echo "Något gick fel, gå tillbaka och kolla att alla uppgifter var ifyllda!";
          }
          
         ?>
        <h2>Tack för ditt köp av:</h2>
<?php 
if(!empty($_SESSION["cart"])){
  $total = 0;
  foreach($_SESSION["cart"] as $keys => $values){
?>
      <p><?php echo $values['varans_namn'].": ".$values['varans_antal']; ?></p>     
<?php
  $total = $total + ($values["varans_antal"] * $values["produkt_pris"]);
  } 
  

?>
      <p><strong>Total summa:</strong></p>
      <p>SEK <?php echo number_format($total, 2); ?></p>
      <h2>Välkommen åter!</h2>
      <p><a href="butik.php">Tillbaka till affären</a></p>
<?php
}else{
  header( "Location: butik.php" ); die;
}
?>
<!-- VISA KUNDVAGN -->
    </div>
  </div>
<?php 
//clear alla session och post variabler
session_destroy();
?> 
  <!-- MAIN ENDS -->
</body>
</html>