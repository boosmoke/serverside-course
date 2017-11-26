<?php


function setKommentarer($conn){
    if(isset($_POST['submitComment'])){
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $username = strip_tags($_POST['username']);
        $email = strip_tags($_POST['email']);
        $homepage = strip_tags($_POST['homepage']);
        $message = strip_tags($_POST['message']);
        
        $sqlKommando = "INSERT INTO comments (uid, date, username, useremail, userhomepage, message) 
                VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sqlKommando);
        $stmt->bind_param("ssssss", $uid, $date, $username, $email, $homepage, $message);
        $stmt->execute();
        $stmt->close();
        //$conn->close();
    }
    
}

function getKommentarer($conn){
    $sqlKommado = "SELECT * FROM comments";
    $result = mysqli_query($conn, $sqlKommado);
    while($row = mysqli_fetch_assoc($result)){
        echo $row['date']."<br>";
        echo $row['username']."<br>";
        echo $row['useremail']."<br>";
        echo $row['message']."<br><br>";
        echo "<hr>";
    }
    
    
}