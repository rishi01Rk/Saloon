<?php
// $server = "localhost";
// $username = "root";
// $password = "";
// $databse = "form";

// $conn = mysqli_connect($server, $username, $password, $databse);
include("conn.php");

$name = $_POST['username'];
$pass = $_POST['password'];

$checkad = false;
$checkuse=false;

if($conn){
    //admin
    $slect_query = "SELECT  * FROM Login";
    $result = mysqli_query($conn, $slect_query);
    if(mysqli_num_rows($result) > 0){
        while($record = mysqli_fetch_assoc($result)){
            if($name === $record['username'] && $pass === $record['password']){
                $checkad = true;
            }
        }
    }
    $slect_quer = "SELECT  * FROM users ";
    $resultu = mysqli_query($conn, $slect_quer);
    if(mysqli_num_rows($resultu) > 0){
        while($recor = mysqli_fetch_assoc($resultu)){
            if($name === $recor['email'] && $pass === $recor['password']){
                $checkuse = true;
            }
        }
    }
}



if ($checkad)  header("location:show.php");
elseif($checkuse) header("location:user.php");

else{
    echo "Login Fail";
}


?>