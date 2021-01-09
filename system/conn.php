<?php 
date_default_timezone_set('Asia/Jakarta');
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "projek_kuliah";

$conn = mysqli_connect($servername, $username, $password,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 ?>