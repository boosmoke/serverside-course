<?php


function setKommentarer($conn){
    if(isset($_POST['submitComment'])){
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $username = strip_tags($_POST['username']);
        $email = strip_tags($_POST['email']);
        $homepage = strip_tags($_POST['homepage']);
        $message = strip_tags($_POST['message']);
        $file = $_FILES['image']['tmp_name'];
        
        if(isset($file)){
            $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $image_name = addslashes($_FILES['image']['name']);
            $image_size = getimagesize($_FILES['image']['tmp_name']);
            if($image_size==FALSE){
                echo "Please insert image only.";
            }else{
                $sqlKommando2 = "INSERT INTO images (id, name, image) VALUES ('', '$image_name', '$image')";
            }
                
                    
        }

        $sqlKommando = "INSERT INTO comments (uid, date, username, useremail, userhomepage, message) 
                VALUES ('$uid', '$date', '$username', '$email', '$homepage', '$message')";
		
        mysqli_query($conn, "START TRANSACTION");

        $result = mysqli_query($conn, $sqlKommando);
        $result2 = mysqli_query($conn, $sqlKommando2);

        if ($result and $result2) {
            mysqli_query($conn, "COMMIT");
        } else {        
            mysqli_query($conn, "ROLLBACK");
        }
       // $result = mysqli_query($conn, $sqlKommando);
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