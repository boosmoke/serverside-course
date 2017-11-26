<?php
$username = $_POST['username'];
// Starta sessionen
session_start();
// Ge sessionen input från post
$_SESSION['username'] = $username;
// Kolla att användaren givit ett namn
if(isset($_SESSION['username']) && $_SESSION['username']!=''){
    //Om ja skicka ut meddelande välkommen
    echo 'Välkommen, '.$_SESSION['username'].' sessionsvariabeln username har fått värdet '.$_SESSION['username'];
// om nej så berätta detta
}else{
    echo 'Måste ha användarnamn, sessionsvariablen är tom';
}
