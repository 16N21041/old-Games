<?php 
$host = "localhost";
$username = "root";
$password = "";
$database = "game";

$conn = mysqli_connect($host, $username, $password, $database);

if($conn != true){
    echo "Error Connecting Database :(";
}
?>
