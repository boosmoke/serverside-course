<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "butik") or die("Could not connect.");
if(isset($_POST["add"])){
    // Om det är första gången sessionen startas refresh tillbaka till butiken
    if(!isset($_SESSION['cart'])){
        header("Refresh:0; url=butik.php#store-location");
    }
    if(isset($_SESSION["cart"])){
        //print_r($_SESSION["cart"]);
        // skapa session med id
        $item_array_id = array_column($_SESSION["cart"], "produkt_id");
        if(!in_array($_GET["id"], $item_array_id)){
            $count = count($_SESSION["cart"]);
            //skapa array med unika värden för kassan
            $item_array = array(
                'produkt_id' => $_GET["id"],
                'varans_namn' => $_POST["hidden_namn"],
                'produkt_pris' => $_POST["hidden_pris"],
                'varans_antal' => $_POST["antal"]
            );
            $_SESSION["cart"][$count] = $item_array;
            //echo '<script>window.location="butik.php"</script>';
            // när varor har lagts till kassan refresh tillbaka
            header("Refresh:0; url=butik.php#store-location");
        }else{
        // Om varan redan finns i kassan refresh tillbaka och berätta för kund
        echo '<script>alert("Produkten finns redan i kassan!")</script>';
        //echo '<script>window.location="butik.php"</script>';
        header("Refresh:0; url=butik.php#store-location");
        }
    }
 else{
    $item_array = array(
        'produkt_id' => $_GET["id"],
        'varans_namn' => $_POST["hidden_namn"],
        'produkt_pris' => $_POST["hidden_pris"],
        'varans_antal' => $_POST["antal"]
    );
 $_SESSION["cart"][0] = $item_array;
 }
}
//ta bort vara från session
if(isset($_GET["action"])){
    if($_GET["action"] == "delete"){
        foreach($_SESSION["cart"] as $keys => $values){
            if($values["produkt_id"] == $_GET["id"]){
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Produkten har tagits bort")</script>';
                //echo '<script>window.location="butik.php"</script>';
                header("Refresh:0; url=butik.php#kassa");
            }
        }
    }
}
//ta bort vara från session om det är information.php
if(isset($_GET["action"])){
    if($_GET["action"] == "delete_info"){
        foreach($_SESSION["cart"] as $keys => $values){
            if($values["produkt_id"] == $_GET["id"]){
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Produkten har tagits bort")</script>';
                //echo '<script>window.location="butik.php"</script>';
                header("Refresh:0; url=information.php");
            }
        }
    }
}
// Om kassa tryckt gå till information.php
if (isset($_POST['till-kassan'])){
    header("Location:information.php");
}
?>
