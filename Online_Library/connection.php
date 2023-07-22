<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "Online_Library";

$connection = mysqli_connect($server_name, $user_name, $password, $database);
if($connection == false){
 die("Error connecting. " .mysqli_connect_error());
}
else{
 echo "Connected";
}

?>